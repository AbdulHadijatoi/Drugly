<?php 
// $con=mysqli_connect("localhost","bdrkustp_root","root","bdrkustp_druglyDB") or die("couldn't connect to db");
$con=mysqli_connect("localhost","root","","druglyDB") or die("couldn't connect to db");

if((isset($_POST['submit'])))
{
    $email = $con->real_escape_string($_POST['email']);
    if(isset($_POST['fullname'])){
        $fullname = $con->real_escape_string($_POST['fullname']);
    }else{
        $fullname = "Subscriber";
    }

    if(isset($_POST['message'])){
        $message = $con->real_escape_string($_POST['message']);
    }else{
        $message = "-";
    }

    $sql="INSERT INTO contact (fullname, email, message) VALUES ('".$fullname."','".$email."', '".$message."')";

    if(!$result = $con->query($sql)){
        die('Error occured [' . $conn->error . ']');
    }
    else{
        header("Location: thank-you.php");
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Drugly</title>
    <link rel="stylesheet" href="common.css">

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

</head>

<body>
    <div id="modal1" class="blur-bg full-width full-height align-in-center position-fixed" style="z-index: 99;">
        <div class="_80-width bg-dark-grey h475 align-in-center position-relative border-radius-30 light-text sm_flex-column">
            <a id="btnModal1" class="cursor-pointer"><img class="w30 position-absolute top-0 right-0 mr-20 mt-20" src="assets/svg/close-ic.svg" alt="close button"></a>
            <div class="mr-140 sm_mr-0"><img class="h73 sm_h45" src="assets/svg/white-ic-4.svg"></div>
            <form action="index.php" method="POST" class="flex-column align-items-center sm_90-width sm_mt-15">
                <h1 class="font-size-40 font-weight-800 sm_font-size-20">Ruszamy już wkrótce</h1>
                <p class="font-weight-400 font-size-22 mb-30 sm_font-size-14 sm_text-align-center sm_mt-10">Zapisz się już dzisiaj i otrzymaj <strong class="text-green font-size-27 sm_font-size-20"> 30% rabatu</strong> na pierwszą wizytę online.
                </p>
                <input class="w480 sm_full-width h56 border-none p-10 pl-20 border-radius-30 outline-none font-size-18 sm_font-size-10 mt-15 sm_h30 sm_mt_0" type="email" name="email" placeholder="Adres e-mail" required>
                <input class="w480 sm_full-width h56 border-none p-10 pl-20 border-radius-30 outline-none font-size-18 sm_font-size-10 mt-15 sm_h30 sm_mt-7" type="text" name="phone" placeholder="Numer telefonu (opcjonalnie)">
                <input class="w480 sm_full-width h56 border-none pl-20 border-radius-30 outline-none bg-green sm_h30 light-text border-none align-in-center cursor-pointer font-size-18 button-effect border-radius-30 mt-30 mb-15 sm_mb_0 sm_mt-0 sm_font-size-16 sm_mt-7 sm_mb-0"
                    type="submit" name="submit" value="Zapisuję się">

                <div class="w470 sm_full-width justify-content-start sm_mt-15">
                    <label class="font-size-14 align-in-center sm_font-size-10 light-text sm_font-size-6"><input class="mr-10 br-1-white bg-transparent" type="checkbox"><label></label> Zapoznałem/am się z Regulaminem i Polityką prywatności i akceptuję
                    je.
                    </label>
                </div>
            </form>
            <div class="ml-140 sm_display-none"><img class="h73" src="assets/svg/white-ic-4.svg"></div>
        </div>
    </div>

    <div id="modal2" class="full-width align-in-center  position-fixed bottom-0 display-none" style="z-index: 98;">
        <div class="full-width bg-dark-grey overflow-hidden align-in-center position-absolute bottom-0 h126 sm_h200 light-text sm_flex-column">
            <a class="cursor-pointer" id="btnModal2"><img class="w30 position-absolute top-0 right-0 mr-20 mt-20 sm_w20" src="assets/svg/close-ic.svg" alt="close button"></a>
            <div class="align-in-center sm_flex-column sm_90-width">
                <img class="h56 mr-30" src="assets/svg/white-ic-5.svg">
                <p class="font-weight-300 line-height-25 font-size-14 sm_font-size-8 sm_text-left sm_mt-10 sm_line-height-20">
                    <span class="font-weight-500 font-size-18">Hej! Ta strona korzysta z ciasteczek.</span> <br>Korzystając z naszej strony internetowej, bez zmiany ustawień przeglądarki, wyrażasz zgodę na przetwarzanie plików cookies na Twoim urządzeniu
                    końcowym.
                    <br>Możesz wyłączyć ten mechanizm w ustawieniach przeglądarki. Więcej informacji na ten temat znajdziesz w naszym <a class="light-text" href="regulamin.php">Regulaminie i Polityce prywatności</a>.
                </p>
            </div>
        </div>
    </div>


    <header class="align-in-center position-fixed z-index-5">
        <div class="content position-relative">
            <a href="index.php"><img id="topLogo" src="assets/svg/logo-1.svg" alt="logo" height="45.84"></a>
            <div class="_55-width justify-content-end">
                <ul id="nav" class="justify-content-between full-width sm_display-none">
                    <li><a href="#onas">O nas</a></li>
                    <li><a href="#jaktodziała">Jak to działa?</a></li>
                    <li><a href="#dlaczegodrugly">Dlaczego Drugly?</a></li>
                    <li><a href="#czy">Czy marihuana jest legalna?</a></li>
                </ul>

                <img id="btn_mobile_menu" class="display-none sm_display-block cursor-pointer hover-effect" src="assets/svg/ic-mobile-menu.svg" width="30" alt="mobile-menu-icon">
            </div>
        </div>
        <ul id="mobile_nav" class="align-items-center full-width flex-column sm_d-flex position-absolute display-none">
            <input type="checkbox" id="mobileNavCheck" class="display-none"><label></label>
            <li><a href="#onas">O nas</a></li>
            <li><a href="#jaktodziała">Jak to działa?</a></li>
            <li><a href="#dlaczegodrugly">Dlaczego Drugly?</a></li>
            <li><a href="#czy">Czy marihuana jest legalna?</a></li>
        </ul>
    </header>

    <main class="align-in-center flex-column overflow-hidden">
        <section id="onas" class="h800 sm_h750 md_h750 justify-content-between align-items-center sm_flex-column-reverse sm_justify-content-center">
            <form action="index.php" method="POST" class="_55-width sm_full-width text-dark-grey">
                <h1 class="font-size-47 font-weight-800 sm_font-size-22 sm_line-height-32 md_font-size-30">Medyczna marihuana bez wychodzenia z domu!<br>Sprawdź, czy się kwalifikujesz!</h1>
                <p class="font-size-17 mt-10 sm_font-size-14 sm_line-height-20 md_font-size-16">Drugly to pierwsza w Polsce w pełni digitalowa klinika specjalizująca się w leczeniu medyczną marihuaną. Ruszamy już wkrótce. </p>
                <p class="font-size-19 text-green mt-20 sm_font-size-14 md_font-size-16">Zapisz się już dziś i otrzymaj <strong class="font-size-22 font-weight-bold sm_font-size-18">30% rabatu</strong> na pierwszą wizytę.</p>
                <div class="input-box w470 sm_full-width sm_h37 sm_mt-15 sm_mb-5 md_full-width">
                    <input class="sm_font-size-10" type="email" name="email" placeholder="Adres e-mail" required>
                    <input type="submit" name="submit" class="sm_font-size-12 text-decoration-none" value="Zapisuję się!">
                </div>
                <div class="input-box w470 sm_full-width sm_h40 sm_mt-10 sm_mb-5 md_full-width">
                    <input class="sm_font-size-10" type="text" name="phone" placeholder="Numer telefony (opcjonalnie)">
                </div>
                <input type="hidden" name="message" value="subcriber">
                <div class="w470 sm_full-width justify-content-start sm_mt-15  md_full-width">
                    <label class="font-size-14 align-in-center sm_font-size-8"><input class="mr-10" type="checkbox"><label></label> Zapoznałem/am się z Regulaminem i Polityką prywatności i akceptuję je.</label>
                </div>
            </form>
            <div class="_45-width sm_80-width sm_mb-20">
                <img class="full-width" src="assets/svg/graphic-1.svg" alt="section-1-graphic">
            </div>
        </section>


        <!-- begins: dotted lines section -->



        <section class="text-dark-grey mt-50 mb-50 sm_mt-10 md_mt-10 md_mt_25 md_mb_25">
        <a class="anchor" id="jaktodziała"></a>

            <h1 class="full-width font-size-47 font-weight-800 sm_font-size-22 sm_line-height-32 text-center">Jak to działa?</h1>
            <p class="full-width text-center font-size-19 text-green mt-10 sm_font-size-16 sm_font-weight-bold sm_mt-0">Zarejestruj się i otrzymaj receptę w 24h!*</p>
            <p class="full-width text-center font-size-17 mt-10 sm_font-size-14 sm_line-height-20 mb-80 sm_mb-30">To prostsze niż myślisz. Bez zbędnych formalności i wychodzenia z domu.</p>

            <div class="full-width flex-column align-items-center">

            <svg class="sm_display-none" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 1280 469.5" style="enable-background:new 0 0 1280 469.5;" xml:space="preserve">
                <foreignObject x="172.1" y="188" width="97.4" height="162.7">
                    <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                        <img src="assets/svg/d-line-1.svg" width="82">
                    </div>
                </foreignObject>
                <foreignObject x="408.5" y="124" width="97.4" height="173.1">
                    <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                        <img src="assets/svg/d-line-2.svg" width="82">
                    </div>
                </foreignObject>
                <foreignObject x="629.2" y="182.8" width="97.4" height="173.1">
                    <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                        <img src="assets/svg/d-line-1.svg" width="82">
                    </div>
                </foreignObject>
                <foreignObject x="846.5" y="124" width="97.4" height="173.1">
                    <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                        <img src="assets/svg/d-line-2.svg" width="82">
                    </div>
                </foreignObject>                
                <foreignObject x="8.7" y="36.1" width="384.6" height="191.6">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 h120 w320 justify-content-start align-items-center p-20 z-index-3 position-relative hover-zoom">
                                <div class="w55 h55 bg-dark-grey align-in-center border-radius-50 mr-10 sm_w32 sm_h32"><img class="w30 sm_w17" src="assets/svg/ic-1.svg"></div>
                                <p class="font-size-19 flex-1 sm_font-size-12">Wypełnij formularz</p>
                            </div>
                        </div>
                    </foreignObject>
                    <foreignObject x="447.7" y="36.1" width="384.6" height="191.6">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 h120 w320 justify-content-start align-items-center p-20 position-relative hover-zoom">
                                <div class="w55 h55 bg-dark-grey align-in-center border-radius-50 mr-10"><img class="w30 sm_w17" src="assets/svg/ic-2.svg"></div>
                                <p class="font-size-19 flex-1 sm_font-size-12">Dokonaj płatności online</p>
                            </div>
                        </div>
                    </foreignObject>
                    <foreignObject x="886.7" y="36.1" width="384.6" height="191.6">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 h120 w320 justify-content-start align-items-center p-20 z-index-3 position-relative hover-zoom">
                                <div class="w55 h55 bg-dark-grey align-in-center border-radius-50 mr-10 sm_w32 sm_h32"><img class="w30 sm_w17" src="assets/svg/ic-3.svg"></div>
                                <p class="font-size-19 flex-1 sm_font-size-12">Otrzymasz sms oraz mail z e-receptą i wszelkimi zaleceniami medycznymi</p>
                            </div>
                        </div>
                    </foreignObject>
                    <foreignObject x="669.2" y="241.8" width="384.6" height="191.6">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 h120 w320 justify-content-start align-items-center p-20 hover-zoom">
                                <div class="w55 h55 bg-dark-grey align-in-center border-radius-50 mr-10"><img class="w30 sm_w17" src="assets/svg/ic-4.svg"></div>
                                <p class="font-size-19 flex-1 sm_font-size-12">System sprawdzi poprawność danych</p>
                            </div>
                        </div>
                    </foreignObject>
                    <foreignObject x="226.2" y="241.8" width="384.6" height="191.6">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 h120 w320 justify-content-start align-items-center p-20 position-relative hover-zoom">
                                <div class="w55 h55 bg-dark-grey align-in-center border-radius-50 mr-10"><img class="w30 sm_w17" src="assets/svg/ic-5.svg"></div>
                                <p class="font-size-19 flex-1 sm_font-size-12">Lekarz dokona diagnozy, a w razie potrzeby skontaktuje się z tobą</p>
                            </div>
                        </div>
                    </foreignObject>
                </svg>

                <svg class="display-none sm_display-block" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                viewBox="0 0 383.9 528" style="enable-background:new 0 0 383.9 528;" xml:space="preserve">

                <foreignObject x="213.9" y="70.9" width="113.8" height="74.7">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <img src="assets/svg/m-line-1.svg" width="82">
                        </div>
                </foreignObject>
                <foreignObject x="58" y="163.5" width="113.8" height="74.7">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <img src="assets/svg/m-line-4.svg" width="82">
                        </div>
                </foreignObject>
                <foreignObject x="213.9" y="252" width="113.8" height="74.7">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <img src="assets/svg/m-line-1.svg" width="82">
                        </div>
                </foreignObject>
                <foreignObject x="213.9" y="380.2" width="113.8" height="74.7">
                        <div class="align-in-center full-width full-height" xmlns="http://www.w3.org/1999/xhtml">
                            <img src="assets/svg/m-line-2.svg" width="82">
                        </div>
                </foreignObject>

                
                <foreignObject x="26.1" y="37.9" width="211.7" height="95.3">
                        <div class="align-in-center full-width full-height p-10" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 justify-content-start align-items-center position-relative hover-zoom full-width h73 p-10">
                                <div class="bg-dark-grey align-in-center border-radius-50 mr-10 w32 h32"><img class="w17" src="assets/svg/ic-1.svg"></div>
                                <p class="flex-1 font-size-12">Wypełnij formularz</p>
                            </div>
                        </div>
                </foreignObject>
                <foreignObject x="146.1" y="126.9" width="211.7" height="95.3">
                        <div class="align-in-center full-width full-height p-10" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 justify-content-start align-items-center position-relative hover-zoom w190 h73 p-10">
                                <div class="bg-dark-grey align-in-center border-radius-50 mr-10 w32 h32"><img class="w17" src="assets/svg/ic-4.svg"></div>
                                <p class="flex-1 font-size-12">System sprawdzi poprawność danych</p>
                            </div>
                        </div>
                </foreignObject>
                <foreignObject x="26.1" y="215.8" width="211.7" height="95.3">
                        <div class="align-in-center full-width full-height p-10" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 justify-content-start align-items-center position-relative hover-zoom w190 h73 p-10">
                                <div class="bg-dark-grey align-in-center border-radius-50 mr-10 w32 h32"><img class="w17" src="assets/svg/ic-2.svg"></div>
                                <p class="flex-1 font-size-12">Dokonaj płatności online</p>
                            </div>
                        </div>
                </foreignObject>
                <foreignObject x="146.1" y="305.3" width="211.7" height="95.3">
                        <div class="align-in-center full-width full-height p-10" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 justify-content-start align-items-center mr-0 hover-zoom w190 h73 p-10">
                                <div class="bg-dark-grey align-in-center border-radius-50 mr-10 w32 h32"><img class="w17" src="assets/svg/ic-5.svg"></div>
                                <p class="flex-1 font-size-12">Lekarz dokona diagnozy, a w razie potrzeby skontaktuje się z tobą</p>
                            </div>
                        </div>
                </foreignObject>
                <foreignObject x="30.6" y="394.8" width="211.7" height="95.3">
                        <div class="align-in-center full-width full-height p-10" xmlns="http://www.w3.org/1999/xhtml">
                            <div class="wide-card box-shadow-5px border-radius-20 justify-content-start align-items-center position-relative hover-zoom w190 h73 p-10">
                                <div class="bg-dark-grey align-in-center border-radius-50 mr-10 w32 h32"><img class="w30 sm_w17" src="assets/svg/ic-3.svg"></div>
                                <p class="flex-1 font-size-12">Otrzymasz sms oraz mail z e-receptą i wszelkimi zaleceniami medycznymi</p>
                            </div>
                        </div>
                </foreignObject>
                
                </svg>
            </div>
        </section>
        <!-- ends: dotted lines section -->

        <section class="mt-100 sm_mt-50 md_mt_25">
            <a class="anchor" id="dlaczegodrugly"></a>
            <h1 class="full-width text-dark-grey font-size-47 font-weight-800 sm_font-size-22 sm_line-height-32 text-center align-items-center justify-content-center sm_font-size-22 mb-40 sm_mb-20">Dlaczego <img class="m-15 h55 sm_h30 vertical-align-middle sm_m-5" src="assets/svg/logo-2.svg"> ?</h1>
            <div class="cards-2-container justify-content-center">
                <div id="card21" class="card-2 w260 h230 align-in-center flex-column border-radius-30 box-shadow-5px sm_w100 sm_h90 sm_border-radious-10 opacity-0">
                    <img class="w76 sm_w30" src="assets/svg/ic-6.svg" width="76">
                    <p class="mt-20 sm_mt-10 font-size-19 text-dark-grey sm_font-size-10 text-center">Łatwy proces</p>
                </div>
                <div id="card22" id="middleCard2" class="card-2 w260 h230 align-in-center flex-column border-radius-30 box-shadow-5px  sm_w100 sm_h90 ml-50 mr-50 sm_mr-20 sm_ml-20  sm_border-radious-10 opacity-0">
                    <img class="w76 sm_w30" src="assets/svg/ic-7.svg" width="76">
                    <p class="mt-20 sm_mt-10 ont-size-19 text-dark-grey sm_font-size-10 text-center">Szybki czas realizacji
                    </p>
                </div>
                <div id="card23" class="card-2 w260 h230 align-in-center flex-column border-radius-30 box-shadow-5px sm_w100 sm_h90  sm_border-radious-10 opacity-0">
                    <img class="w76 sm_w30" src="assets/svg/ic-8.svg" width="76">
                    <p class="mt-20 sm_mt-10 font-size-19 text-dark-grey sm_font-size-10 text-center">Wykwalifikowana kadra lekarzy</p>
                </div>
            </div>
        </section>

        <section id="tableSection" class="_80-width box-shadow-5px align-in-center flex-column text-dark-grey mt-80 mb-100 sm_mt-50 border-radius-20">
            <div class="bg-dark-grey text-green border-radius-20 full-width h65 justify-content-between font-size-24 sm_font-size-12 md_font-size-12">
                <div class="text-center _30-width full-height align-in-center sm_33-width">Nasza oferta</div>
                <div class="text-center _40-width full-height align-in-center sm_33-width" style="border-right: 1px solid rgba(255,255,255,0.4); border-left: 1px solid rgba(255,255,255,0.4);">Przykładowa metoda leczenia</div>
                <div class="text-center _30-width full-height align-in-center sm_33-width">Dostępność w Drugly</div>
            </div>
            <div class="align-in-center full-width h130 font-size-24 md_font-size-12 sm_font-size-12 overflow-hidden">
                <div class="text-center _30-width full-height align-in-center sm_33-width" style="border-bottom: 1px solid rgba(0,0,0,0.1);">Terapie konopne</div>
                <div class="text-center _40-width full-height align-in-center sm_33-width" style="border: 1px solid rgba(0,0,0,0.1)">Medyczna marihuana</div>
                <div class="text-center _30-width full-height align-in-center sm_33-width" style="border-bottom: 1px solid rgba(0,0,0,0.1);"> <img class="w43 sm_w31" src="assets/svg/ic-9.svg"> </div>
            </div>
            <div class="align-in-center full-width h130 font-size-24 sm_font-size-12 md_font-size-12 overflow-hidden">
                <div class="text-center _30-width full-height align-in-center sm_33-width">Inne</div>
                <div class="text-center _40-width full-height align-in-center sm_33-width" style="border: 1px solid rgba(0,0,0,0.1); border-top: 0px; border-bottom: 0px;">Tabletki antykoncepcyjne, tabletki 72h „po” Leki nasenne oraz inne leki</div>
                <div class="text-center _30-width full-height align-in-center sm_33-width"> <img class="w43 sm_w31" src="assets/svg/ic-10.svg"> </div>
            </div>
        </section>

        <section class="_80-width justify-content-between mt-50 mb-100 sm_mt-10 sm_mt-80">
            <a class="anchor" id="czy"></a>
            <div class="_50-width sm_full-width justify-content-start flex-column text-dark-grey">
                <h1 class="heading1 text-dark-grey font-size-40 font-weight-800 sm_mb-15 sm_font-size-22 sm_line-height-32 sm_font-size-22 md_font-size-22 sm_full-width sm_text-align-center">Czy marihuana jest legalna?</h1>

                <!-- begins: only for mobile view -->
                <div class="justify-content-between display-none sm_display-flex">
                    <div id="card3b" class="w84 box-shadow-5px full-height align-in-center border-radius-20 mr-15 opacity-0">
                        <img class="w75" src="assets/svg/graphic-2.svg">
                    </div>
                    <p id="para11" class="para font-size-14 font-weight-300 line-height-30 sm_line-height-25">
                        <strong class="font-size-18">Tak!</strong> Legalizacja marihuany medycznej została przyjęta ustawą w październiku
                        <span class="font-weight-500 text-dark-grey">2017 roku i od tego dnia jest dostępna jako alternatywny środek medyczny.</span> </p>
                </div>
                <p id="para12" class="para font-size-14 font-weight-300 line-height-30 sm_line-height-25 display-none sm_display-block">Medyczna marihuana została dopuszczona do leczenia <span class="font-weight-500 text-dark-grey">szerokiej grupy schorzeń</span> między innymi bezsenność, bóle miesiączkowe czy migreny, kiedy klasyczne leki nie przynoszą pożądanych efektów.</p>
                <!-- ends: only for mobile view -->

                <p id="para13" class="para font-size-19 font-weight-300 md_font-size-14 line-height-30 sm_line-height-25 sm_display-none">
                    <strong>Tak!</strong> Legalizacja marihuany medycznej została przyjęta ustawą w październiku
                    <strong>2017 roku i od tego dnia jest dostępna jako alternatywny środek medyczny.</strong> Medyczna marihuana została dopuszczona do leczenia szerokiej grupy schorzeń między innymi bezsenność, bóle miesiączkowe czy migreny, kiedy klasyczne
                    leki nie przynoszą pożądanych efektów.</p>

                <p id="para21" class="para font-size-19 font-weight-300 md_font-size-14 line-height-30 sm_line-height-25 sm_font-size-14 md_font-size-14 mt-20 sm_mt_2">
                    <strong class="sm_text-dark-grey">W związku z ustawą, marihuana musi być sprowadzana zza 
granicy.</strong> Obecnie w Polsce jedynym importerem konopi medycznych jest spółka Spectrum Cannabis. To właśnie ten
                    <strong class="sm_text-dark-grey">legalny i przetestowany produkt przepisują nasi lekarze. </strong>
                </p>
                <p id="para31" class="para font-size-19 font-weight-300 line-height-30 sm_line-height-25 sm_font-size-14 md_font-size-14 mt-20 sm_mt_2">
                    W tym momencie leczenie medyczną marihuaną nie jest objęte refundacją NFZ, lecz <strong class="sm_text-dark-grey">legalny zakup jednego gram suszu kosztuje 
od 40 zł do 60 zł</strong> w zależności od apteki.
                </p>
            </div>
            <div id="card3" class="_40-width box-shadow-5px h500 align-in-center border-radius-20 sm_display-none opacity-0">
                <img class="w350 md_w250" src="assets/svg/graphic-2.svg">
            </div>
        </section>

        <section class="_80-width text-dark-grey justify-content-between md_flex-column mb-100 sm_mb-30 mt-100 sm_mt-10 md_mt_25 md_full-width md_align-items-center">
            <div id="contactDetails" class="flex-column align-items-start _40-width sm_full-width md_full-width md_align-items-center md_mb-30">
                <img class="h40 sm_h27" src="assets/svg/logo-3.svg">
                <h1 class="text-dark-grey font-size-40 font-weight-800 sm_font-size-22 sm_line-height-32 sm_font-size-22 sm_full-width sm_text-align-center">Skontakuj się z nami!</h1>
                <p class="mt-15 sm_mt-10 font-size-26 text-dark-grey sm_font-size-10 sm_font-size-16">Jesteśmy dostępni pod adresem:</p>
                <p class="mt-15 sm_mt-10 font-size-20 text-green sm_font-size-14 text-center sm_mb-15">info@drugly.pl</p>
            </div>
            <form action="index.php" method="POST" id="contactForm" class="_60-width bg-dark-grey border-radius-20 justify-content-center sm_90-width md_60-width">
                <div class="_85-width flex-column mt-30 mb-40">
                    <h3 class="full-width text-green font-size-22 font-weight-bold sm_font-size-14 sm_mb_0">Formularz kontaktowy</h3>

                    <input class="h56 border-none p-10 pl-20 border-radius-30 outline-none font-size-18 sm_font-size-10 mt-30 sm_h30 sm_mt-15" type="text" name="fullname" placeholder="Imię" required>
                    <input class="h56 border-none p-10 pl-20 border-radius-30 outline-none font-size-18 sm_font-size-10 mt-30 sm_h30 sm_mt-15" type="email" name="email" placeholder="Adres e-mail" required>
                    <div class="overflow-hidden h56 border-radius-30 align-in-center mt-30 sm_h100 sm_mt-15 sm_border-radious-15">
                        <textarea class="border-none p-20 overflow-hidden outline-none font-size-18 sm_font-size-10 full-width full-height" type="text" name="message" placeholder="Wiadomość" required></textarea>
                    </div>
                    <input class="full-width h56 border-none pl-20 border-radius-30 outline-none bg-green sm_h30 light-text border-none align-in-center cursor-pointer font-size-18 button-effect border-radius-30 mt-30 mb-15 sm_mb_0 sm_mt-0 sm_font-size-16 sm_mt-15 sm_mb-0"
                        type="submit" value="Wysyłam!" name="submit">

                    <div class="w470 sm_full-width justify-content-start sm_mt-15">
                        <label class="font-size-14 align-in-center sm_font-size-10 light-text"><input class="mr-10" type="checkbox"><label></label> Zapoznałem/am się z Regulaminem i Polityką prywatności i akceptuję je.</label>
                    </div>
                </div>
            </form>
        </section>

    </main>

    <footer class="align-in-center">
        <div class="content align-in-center flex-column light-text font-weight-400">
            <div class="align-in-center">
                <img src="assets/svg/white-ic-1.svg" width="25">
                <img class="mr-10 ml-10" src="assets/svg/white-ic-2.svg" width="25">
                <img src="assets/svg/white-ic-3.svg" width="25">
            </div>
            <a href="regulamin.php" class="mb-10 mt-10 text-decoration-none light-text">Regulamin i Polityka prywatności</a>
            <p>©Drugly 2021</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>

</html>