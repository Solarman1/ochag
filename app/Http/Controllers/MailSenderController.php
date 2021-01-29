<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailochag;

class MailSenderController extends Controller
{
    public function index()
    {
        $orederId = Order::select('id')->orderBy('id', 'desc')->limit(1)->get();
        foreach($orederId as $value)
        {
            $idValue = $value->id;
        }

        $orderData  = Order::where('id', $idValue)->get();
        $basketData = Basket::where('orderId', $idValue)->get(); 

        // foreach($basketData as $value)
        // {
        //     dd($value);
        // }
        $data = [];
        $basketDataToOrder = [];
        
        //dd($orderData);
        //dd($basketData);
        foreach($basketData as $value)
        {
            //dd($value);
            $product = [
                'name'      =>  $value->productName,
                'quantity'  =>  $value->productQuantity
            ];
            $basketDataToOrder[] = $product;
        }
        //dd($basketDataToOrder);

        foreach($orderData as $value)
        {
            $to_name     = $value->customerName;
            $to_email    = $value->customerEmail;
            $payment     = $value->paymentType;
            $paymentInfo = '';
            $sdachaInfo  = '';
           
            switch ($payment) {
                case 1:
                    $paymentInfo = "оплата на сайте";
                    break;
                case 2:
                    $paymentInfo = "расчет по карте курьеру";
                    break;
                case 3:
                    $paymentInfo = "расчет наличными";
                    break;
            }

            if($payment > 1)
            {
                $sdachaInfo  = 'оплата безналом, без сдачи';
            }
            else
            {
                $sdachaInfo  = "нужна сдача с $value->sdacha";
            }

            $data = [
                'name' => "Заказ с сайта", 
                "body" => "
    mail: $to_email,
    Имя клиента: $to_name,
    Номер:    $value->customerPhone,
    Адрес: $value->customerAdres,
    Время доставки: $value->deliveryTime,
    Метод доставки: $paymentInfo,
    Количетсво приборов/людей: $value->personsCount,
    Сдача: $sdachaInfo,
    Коментарий: $value->description,
    Общая цена: $value->totalPrice,
    Заказ создан: $value->created_at,
    ",

    "products" => $basketDataToOrder,

            ];         
        }
        Mail::send(['text'=>'emails'], $data, function($message) use ($to_name, $to_email) {
            $message->to("deliverytest_ochag55@mail.ru", $to_name)->subject('Заказ с сайта очага');
            $message->from('ochag@ochag55.ru','Очаг доставка еды');
        }); 
       //Mail::to($to_email)->send(new Mailochag);
        // mail($to_email, 'My Subject', 'fewfwe');
        
    }
}
