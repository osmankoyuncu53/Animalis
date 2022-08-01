<?php

require_once('config.php');
//veritabanına bağlan burada include et 
//sorguları yaz kullanıcıyı çek kullanıcının id'sini session ile tut burada verilerini çek 
//burada da sipariş geçen bilgilerini yaz 
include "../netting/baglan.php";

session_start();
$komut=$db->prepare("SELECT * FROM uyeler WHERE K_id=:id");
$komut->execute(array('id'=>$_SESSION['Kullanici_ID']));
$oku=$komut->fetch(PDO::FETCH_ASSOC);


$kullanici_id=$oku['K_id'];
$kullanici_adsoyad=$oku['KullaniciAdi'];
$Sifre=$oku['Sifre'];	

$kullanici_ad=$oku['Ad'];
$kullanici_soyad=$oku["Soyad"];
$kullanici_gsm=$oku["TelefonNumarasi"];
$kullanici_mail=$oku["EmailAdresi"];
$kullanici_zaman=$oku["kayitTarih"]; 
$kullanici_adresiyaz="Topkapı Sarayı Çatalca / İstanbul";
$kullanici_il="İstanbul";
$siparis_no=rand(1,1000);;
$sepettoplam=$_SESSION['genel_total'];



# create request class
$request = new \Iyzipay\Request\CreateCheckoutFormInitializeRequest();
$request->setLocale(\Iyzipay\Model\Locale::TR);
$request->setConversationId("$siparis_no");
$request->setPrice($sepettoplam);
$request->setPaidPrice($sepettoplam);
$request->setCurrency(\Iyzipay\Model\Currency::TL);
$request->setBasketId("$siparis_no");
$request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
//Burada da sonuc sayfasına yönlendirme yapıyorsun örneğin
$request->setCallbackUrl("http://www.animalis.website/iyzico/sonuc.php");
$request->setEnabledInstallments(array(2, 3, 6, 9));

//burarları da veritabanından kullanıcının bilgilerini çekerek doldur bitti bu kadar
$buyer = new \Iyzipay\Model\Buyer();
$buyer->setId("$kullanici_id");
$buyer->setName("$kullanici_ad");
$buyer->setSurname("$kullanici_soyad");
$buyer->setGsmNumber("$kullanici_gsm");
$buyer->setEmail("$kullanici_mail");
$buyer->setIdentityNumber("74300864791");
$buyer->setLastLoginDate("2015-10-05 12:43:35");
$buyer->setRegistrationDate("2015-10-05 12:43:35");
$buyer->setRegistrationAddress("istanbul/bahçelievler");
$buyer->setIp("85.34.78.112");
$buyer->setCity("istanbul");
$buyer->setCountry("Turkey");
$buyer->setZipCode("34732");
$request->setBuyer($buyer);

$shippingAddress = new \Iyzipay\Model\Address();
$shippingAddress->setContactName("$kullanici_ad");
$shippingAddress->setCity("$kullanici_il");
$shippingAddress->setCountry("Turkey");
$shippingAddress->setAddress("$kullanici_adresiyaz");
$shippingAddress->setZipCode("34742");
$request->setShippingAddress($shippingAddress);

$billingAddress = new \Iyzipay\Model\Address();
$billingAddress->setContactName("$kullanici_ad");
$billingAddress->setCity("$kullanici_il");
$billingAddress->setCountry("Turkey");
$billingAddress->setAddress("$kullanici_adresiyaz");
$billingAddress->setZipCode("34742");
$request->setBillingAddress($billingAddress);

$basketItems = array();
$firstBasketItem = new \Iyzipay\Model\BasketItem();
$firstBasketItem->setId("$siparis_no");
$firstBasketItem->setName("Animalis");
$firstBasketItem->setCategory1("Collectibles");
$firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::PHYSICAL);
$firstBasketItem->setPrice($sepettoplam);
$basketItems[0] = $firstBasketItem;
$request->setBasketItems($basketItems);


# make request
$checkoutFormInitialize = \Iyzipay\Model\CheckoutFormInitialize::create($request, Config::options());

# print result
//print_r($checkoutFormInitialize);
//print_r($checkoutFormInitialize->getstatus());
print_r($checkoutFormInitialize->getErrorMessage());
print_r($checkoutFormInitialize->getCheckoutFormContent());



?>

