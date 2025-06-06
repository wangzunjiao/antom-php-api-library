<?php
require '../init.php';

use Client\DefaultAlipayClient;
use Model\Amount;
use Model\Buyer;
use Model\Env;
use Model\Merchant;
use Model\Order;
use Model\OsType;
use Model\PaymentFactor;
use Model\PaymentMethod;
use Model\PresentmentMode;
use Model\ProductCodeType;
use Model\SettlementStrategy;
use Model\Store;
use Model\TerminalType;
use Model\WalletPaymentMethodType;
use Request\pay\AlipayInquiryRefundRequest;
use Request\pay\AlipayPayCancelRequest;
use Request\pay\AlipayPayConsultRequest;
use Request\pay\AlipayPaymentSessionRequest;
use Request\pay\AlipayPayQueryRequest;
use Request\pay\AlipayPayRequest;
use Request\pay\AlipayRefundRequest;


const clientId = "SANDBOX_5YES502ZS7KG03623";
const merchantPrivateKey = "MIIEvAIBADANBgkqhkiG9w0BAQEFAASCBKYwggSiAgEAAoIBAQC9tC4d3Wnf65KfcyjKXfbPUwO/OT6p4VhRaY8VxETG7WWAVWPYwECPNprsK/Waoce2ItVHzWzy/+3avs0jOkUudXH9CoDqDX/DqGAPbW3MdFU1+aVfkO96rC/Dyfqm6m0+WgqKXCIC1ohxKuYC+0n6nDBTwbfuoUTCXtWA9jxvmfkWJ2jJSQKegePdXX1t0GrGMEzAoAMur0/k/pu6ys9cCRMa90A5yr3rMQNdeE/5u97Qpn8oQYfWkYF73vK8lUx4cNlaQUBvNue5HNcdNV5Cx40+RNj7W3KfqmAIKV3PWYwrwvuJOXkVdP4h/vch4rHFTSovclnTJmlpnVdPe7qRAgMBAAECggEABeBE5WvsUaFMY1//zXTnpjheD1hIlp6CS9NHOVdhAgBsenMqqpYZ6dW5KsOZ0fZc50lg7d5xF33R8kqitAqkBfJhW4MtxxIv+PGIODIdio237foTo0gsAtK+kAP7nZv5UksbtHlyHEBk7Yx0n3cFLZwU6yM+/UdFh/fECUCXUqWWnq39Ub8onxK5KGN4tQDxV9lZQtlAd8ecbQ1yC8sYNtNCLQD+IcGuPooqEXb6bIq1yFdXKItrWr0zt/UAn2Q3CqbFZPnQgxm2k9lrKLhwEtkSF3MuKLZ2v/6AO+P7Nf4fzQwADoUjcoRrq/2m68a9csUJm1gOcI1bSnJE/nLhIQKBgQDtoKi3APMIzauqN0dEUZG9GDmy1E0O2zdRLc1sfw9jI33739xCM4Qi1L1pS8Tq9/GKXy5AjTp6OCemvYvNvWTiBIXU51BTsvtr55DMRKJz86mOZInHak02CKKlDFUL3Imw40R//+I9TwkqPJsdyAFPvrLHOLjED9CC7RnwfkTkrQKBgQDMXviD6ZFz3ARaC2YJojdSBmd0UWX0895eeWpMliJTg4SouhNIVX7ZnBMtqafOfn6fuTW48fgvZVejHA75D7rUBbkSmuQgUweRT+h6j3tb5YvX8Yfq/a6223m0H96Fp/zG9UmhTaq4qnEZtU1JaEysPUXYs2zwO2qaFuzmGJuF9QKBgBbpabsTdVuA8S9dWxrEPqgb4NxUSgXHr0K9htQSQDqP3oLdp9AeRXxSRN0VOCxrsbdkzAHfXCcSqQgTuJoiy8pbI0hO8VjQphtWXYjEiWFiuhOHsB0xK7atCHmfgce+AOy0TROGaZr9tuWCqHYrpay5t2UsG+yTlcg58klU83GVAoGATUPGftCqHfxbZNOUYyYB9i/XowE3I7GjK2KJzqSgG6TIXaXjrmAsUgcQtR3EBGyMYMR7zA0nAHw28sKj4oOQ5aG4Q5Ftl87sOILWaKegQrD4+s4kzbHVAOrfCztVPICzL2EC0knztlcx5T9HFe6ptiCALJpBIF3GQrVSIPfCrJUCgYAG5vUql6cXg9WqLLGYoBlYfsXxyDR3iygHHElYXk4j43Utki9EBK+sKyLeZGJtQPq0+QW0VsgcUhAjaT/eMQPKfm9mmwKr+ZK4S83SKBmqF5PWIifKd2HGmXbuowH1TzDgwwLrqEcyt9WM9u/1+XeFOwlDISFTMYXkXHDQ8kNcKg==";

const alipayPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAlrcFqfGF1W/0HyvzAeV1MsipDAWM3yt+PFSVmwbxtiHfk0o27ubA8pyyo3N7j/u/PrDhDi5Aq6d5f0oDfLNSEY1C/PBU0/LruObAp7fOTDiIdkL44h4q71pw1sPOLb7bPLXtAhlzWRyGxV7IDDPkXpXC14BBAtPJUK0ICMDPyMJBNI6qUq5jK33N67XcnlnPQQETbb3pwBqgvK7u00RBZPGpyo2HW+n0hRHN/kd9E/M6UO3H0RoJsEa9o14QPVQOdILopL7eXr/6Y7BHoz78itpSozn7jFi+tc+iYxrJLUKIcrIdOVMx72kNcpBEMoaMl74gFlOwKFAUUM0cL7Lc4wIDAQAB";

const gatewayUrl = "https://open-na-global.alipay.com";


function pay()
{
    $request = new AlipayPayRequest();

    $paymentRequestId = 'PR_' . round(microtime(true) * 1000);
    $order = new Order();
    $order->setOrderDescription("test order desc");
    $order->setReferenceOrderId("102775745075668");
    $orderAmount = new Amount();
    $orderAmount->setCurrency("HKD");
    $orderAmount->setValue("100");
    $order->setOrderAmount($orderAmount);

    $merchant = new Merchant();
    $merchant->setReferenceMerchantId('seller2322174590001');
    $merchant->setMerchantMCC('7011');
    $merchant->setMerchantName('Some_Mer');

    $store = new Store();
    $store->setStoreMCC('7011');
    $store->setReferenceStoreId('store232217459000021');
    $store->setStoreName('Some_Store');

    $merchant->setStore($store);

    $order->setMerchant($merchant);

    $env = new Env();
    $env->setUserAgent('"Mozilla/5.0 (iPhone; CPU iPhone OS 11_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/15G77 NebulaSDK/1.8.100112 Nebula PSDType(1) AlipayDefined(nt:4G,ws:320|504|2.0) AliApp(AP/10.1.32.600) AlipayClient/10.1.32.600 Alipay Language/zh-Hans AlipayConnect"');
    $env->setOsType(OsType::ANDROID);
    $env->setTerminalType(TerminalType::WEB);
    $order->setEnv($env);

    $request->setOrder($order);

    $paymentAmount = new Amount();
    $paymentAmount->setCurrency("HKD");
    $paymentAmount->setValue("100");
    $request->setPaymentAmount($paymentAmount);

    $paymentNotifyUrl = "https://www.alipay.com/notify";
    $paymentRedirectUrl = "https://www.alipay.com";

    $request->setPaymentNotifyUrl($paymentNotifyUrl);
    $request->setPaymentRedirectUrl($paymentRedirectUrl);

    $paymentMethod = new PaymentMethod();
    $paymentMethod->setPaymentMethodType(WalletPaymentMethodType::ALIPAY_HK);
    $request->setPaymentMethod($paymentMethod);

    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);

    $request->setClientId(clientId);

    $request->setPaymentRequestId($paymentRequestId);

    //$request->setPath("/ams/sandbox/api/v1/payments/pay");

    $settlementStrategy = new SettlementStrategy();
    $settlementStrategy->setSettlementCurrency("USD");
    $request->setSettlementStrategy($settlementStrategy);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey);
    $alipayResponse = $alipayClient->execute($request);

    echo json_encode($alipayResponse);

//    print(json_encode($alipayResponse));
//    print("\n" . $paymentRequestId);
}

function queryPay($paymentRequestId)
{
    $request = new AlipayPayQueryRequest();
    $request->setPaymentRequestId($paymentRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));

}

function refund($paymentId)
{
    $request = new AlipayRefundRequest();
    $refundRequestId = "refund_" . round(microtime(true) * 1000);
    $request->setRefundRequestId($refundRequestId);
    $request->setPaymentId($paymentId);
    $amount = new Amount();
    $amount->setCurrency("HKD");
    $amount->setValue("100");
    $request->setRefundAmount($amount);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
    print("\n" . $refundRequestId);


}

function queryRefund($refundRequestId)
{
    $request = new AlipayInquiryRefundRequest();
    $request->setRefundRequestId($refundRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}

function cancel($paymentRequestId)
{
    $request = new AlipayPayCancelRequest();
    $request->setPaymentRequestId($paymentRequestId);
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}

function createSession()
{
    $request = new AlipayPaymentSessionRequest();
    $paymentRequestId = 'PR_' . round(microtime(true) * 1000);
    $order = new Order();
    $order->setOrderDescription("test order desc");
    $order->setReferenceOrderId(round(microtime(true) * 1000));
    $buyer = new Buyer();
    $buyer->setReferenceBuyerId("buyer_" . round(microtime(true) * 1000));
    $order->setBuyer($buyer);
    $request->setOrder($order);

    $paymentAmount = new Amount();
    $paymentAmount->setCurrency("SGD");
    $paymentAmount->setValue("4200");
    $request->setPaymentAmount($paymentAmount);

    $paymentNotifyUrl = "https://www.alipay.com/notify";
    $paymentRedirectUrl = "https://www.alipay.com";

    $request->setPaymentNotifyUrl($paymentNotifyUrl);
    $request->setPaymentRedirectUrl($paymentRedirectUrl);

    $paymentMethod = new PaymentMethod();
    $paymentMethod->setPaymentMethodType("CARD");
    $request->setPaymentMethod($paymentMethod);
    $cardPaymentMethodDetail = new \Model\CardPaymentMethodDetail();
    $cardPaymentMethodDetail->setIs3DSAuthentication(true);
    $paymentMethod->setPaymentMethodMetaData($cardPaymentMethodDetail);

    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);

    $request->setClientId(clientId);

    $request->setPaymentRequestId($paymentRequestId);

    $paymentMethodTypeItem = new \Model\PaymentMethodTypeItem();
    $paymentMethodTypeItem->setPaymentMethodType("CARD");
    $availablePaymentMethod = new \Model\AvailablePaymentMethod();
    $availablePaymentMethod->setPaymentMethodTypeList([$paymentMethodTypeItem]);

    $request->setAvailablePaymentMethod($availablePaymentMethod);

    echo json_encode($request);

    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey);
    $alipayResponse = $alipayClient->execute($request);

    echo json_encode($alipayResponse);

    print($alipayResponse -> result);
    print("\n" . $paymentRequestId);

}

function consult()
{
    $request = new AlipayPayConsultRequest();
    $settlementStrategy = new SettlementStrategy();
    $settlementStrategy->setSettlementCurrency("USD");
    $request->setSettlementStrategy($settlementStrategy);
    $request->setProductCode(ProductCodeType::CASHIER_PAYMENT);
    $request->setUserRegion("SG");
    $request->setAllowedPaymentMethodRegions(["SG", "HK", "CN"]);
    $env = new Env();
    $env->setOsType(OsType::IOS);
    $env->setTerminalType(TerminalType::APP);
    $request->setEnv($env);
    $amount = new Amount();
    $amount->setCurrency("USD");
    $amount->setValue("1000");
    $request->setPaymentAmount($amount);
    $paymentFactor = new PaymentFactor();
    $paymentFactor->setPresentmentMode(PresentmentMode::BUNDLE);
    $request->setPaymentFactor($paymentFactor);
    print(json_encode($request));
    $alipayClient = new DefaultAlipayClient("https://open-sea-global.alipay.com", merchantPrivateKey, alipayPublicKey, clientId);
    $alipayResponse = $alipayClient->execute($request);
    print(json_encode($alipayResponse));
}


pay();
//cancel("PR_1724811957224");
//queryPay("PR_172352027421");
//refund("202408131940108001001881A0212894597");
//queryRefund("refund_1723527767056");
//consult();
//createSession();