<?php

require '../init.php';



const alipayPublicKey = "MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAm6eBqn+u+q+YM8p8/k9+h36QU1MeVmaRfZTy2RAieZQ/bOiiV2Cp+tNHUy3zjncwbrpMw2NdsNJ+6ZpaSk3JinTn083WhcpcZrYLKoIAVjXYrC6T043Y4gBRksBE2HTikqrfUK57dBuYNphikV/fiLhJgJsOAD+JnNdXmlT3tn7mF3HiAZV19cY1Oi4NaMeGKwq+4OBVN+H9Bv7ytYKeC4wMLLSSAiKzR3CyPEUuYPunxjZi7wRRJ04LEmejLx0vOh8ea7Fp6zvmCH+HpeJrTNE4pJlSETbsA6071ddPK8Yxo2ulKaKd2D+BZ/D0lIZIndVnkO6Y3DizIxVkeE6WKQIDAQAB";

function checkRspSign()
{
    $httpMethod = 'POST';
    $path = '/index.php/job/notify/antompay';
    $clientId = 'SANDBOX_5YET942ZTUH303813';
    $rspTime = '2025-05-17T07:58:04Z';
    $rspBody = '{"actualPaymentAmount":{"currency":"HKD","value":"10000"},"notifyType":"PAYMENT_RESULT","paymentAmount":{"currency":"HKD","value":"10000"},"paymentCreateTime":"2025-05-17T00:57:31-07:00","paymentId":"202505171940108001001885J0234117653","paymentRequestId":"PR_1747468651136","paymentResultInfo":{},"paymentTime":"2025-05-17T00:58:04-07:00","pspCustomerInfo":{"pspCustomerId":"10086","pspName":"TNG"},"result":{"resultCode":"SUCCESS","resultMessage":"success.","resultStatus":"S"}}';
    $rspSignValue = 'lqFXp2mI8F7I2Dn198kVPJT32KpRN1uq9fnzF%2BZ%2B%2Fkl1ll4u8OC5mmc%2BN%2FAn1IYeXNj%2ByS6gssMSDNvj7d%2F1sm%2BQlRRqU4EsL7b8YayZwGvr%2BrzTElTFstSWbxd%2BTBM%2FoIZut1wEJMOBsyKO7dzT2N%2FuM3TywI8T2LsFNn95h%2FCUjhDsUg2NaNdYKU7i4Tkgl5Q9IYId1Os8GNmeAOPE49Hvtc30ve6CwhBmeelI5yzIfGOvQxEs%2BA%2FKX12D4zgUCo3l93FNPpUMAAuWZP7SjC089N%2BkOXG6c4RVwuf4dfVl3IT%2Fml0mQp2OHPaLgwK4Kl0HnAUNuA5k8nZjay5SGQ%3D%3D';

    try {
        $isVerify = \Client\SignatureTool::verify($httpMethod, $path, $clientId, $rspTime, $rspBody, $rspSignValue, alipayPublicKey);
    } catch (\Exception $e) {
        throw new \Exception($e);
    }
   printf($isVerify);
}


checkRspSign();