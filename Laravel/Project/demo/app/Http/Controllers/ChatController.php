<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function sendMessage(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $apiKey = env('OPENAI_API_KEY');

        if (!$apiKey) {
            return response()->json([
                'error' => 'API key is not configured.'
            ], 500);
        }

        // 1. تحديد المستخدم الحاضر ودوره
        $user = Auth::user();

        // 2. تجهيز البيانات المناسبة بناءً على صلاحيات المستخدم
        $contextData = [];

        if ($user) {
            // بيانات أساسية لكل مستخدم مسجل دخول
            $contextData['current_user'] = [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->role ?? 'user',
            ];

            // جلب الأوردرات الخاصة بالمستخدم إذا كان عامل العلاقة (orders)
            if (method_exists($user, 'orders')) {
                $contextData['user_orders'] = $user->orders()->with('products')->get()->toArray();
            }

            // إذا كان المستخدم Admin، نعطيه صلاحية الوصول لبيانات إضافية عن النظام
            if (($user->role ?? '') === 'admin') {
                $contextData['system_stats'] = [
                    'total_users' => User::count(),
                    'total_categories' => Category::count(),
                    'total_products' => Product::count(),
                    'total_orders' => Order::count(),
                ];
                $contextData['all_categories'] = Category::all(['id', 'name', 'description'])->toArray();
                $contextData['all_products'] = Product::all(['id', 'name', 'price', 'quantity'])->toArray();
            }
        }

        // 3. كتابة تعليمات للـ AI مع تزويده بالبيانات
        // $systemPrompt = "أنت مساعد ذكي لتطبيقنا. اجب على أسئلة المستخدم باللغة العربية بناءً على البيانات التالية المتاحة لك فقط:\n";
        // $systemPrompt .= json_encode($contextData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
        // $systemPrompt .= "\n\nإذا كان السؤال عن شيء خارج هذه البيانات أو غير مسموح لدوره برؤيته، أبلغه بذلك بلباقة.";
// 4. صياغة الـ Prompt للذكاء الاصطناعي باللغة الإنجليزية
$systemPrompt = "You are a helpful AI assistant for our application. Always respond to the user in English based ONLY on the following context data:\n";
$systemPrompt .= json_encode($contextData, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$systemPrompt .= "\n\nIf the user asks about something outside of this data or something their role does not have access to, politely inform them that you do not have access to that information.";
        // 4. إرسال الطلب لـ OpenAI
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4o-mini',
            'messages' => [
                ['role' => 'system', 'content' => $systemPrompt],
                ['role' => 'user', 'content' => $request->message],
            ],
        ]);

        if ($response->successful()) {
            $reply = $response->json()['choices'][0]['message']['content'] ?? 'لم يتم استلام رد.';
            return response()->json(['reply' => $reply]);
        }

        return response()->json([
            'error' => 'حدث خطأ في الاتصال بالخدمة: ' . ($response->json()['error']['message'] ?? 'خطأ غير معروف')
        ], 500);
    }
}
