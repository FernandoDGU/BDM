<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Mensajes</title>

        <!-- Boostrap
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
              integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
                integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi"
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
                integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG"
        crossorigin="anonymous"></script>  -->
        <!--Css  -->
        <link rel="stylesheet" href="css/Chat.css">
    </head>

    <body>
        <!-- <h1>Esta es una prueba en php para ver si jala esta madre </h1>
    
        <marquee direction="up">Este texto se mueve de abajo hacia arriba</marquee>
        <marquee direction="left">lalalal</marquee> -->
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>




        <!--
         <br />
         <div class="input-group mb-3">
             <button class="btn btn-outline-secondary" type="button">Button</button>
             <select class="form-select" id="inputGroupSelect03" aria-label="Example select with button addon">
                 <option selected>Todos los mensajes</option>
                 <option value="1">One</option>
                 <option value="2">Two</option>
                 <option value="3">Three</option>
             </select>
         </div>
         <div class="input-group mb-3">
             <input type="text" class="form-control" placeholder="Buscar" aria-label="Recipient's username" aria-describedby="button-addon2">
             <button class="btn btn-outline-secondary" type="button" id="button-addon2"><img src="https://img.icons8.com/material-outlined/24/000000/search--v2.png" /></button>
         </div>-->
        <div id="frame">
            <div id="sidepanel">

                <div id="contacts">
                    <ul>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/louislitt.png" alt="" />
                                <div class="meta">
                                    <p class="name">Louis Litt</p>
                                </div>
                            </div>
                        </li>
                        <li class="contact active">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <div class="meta">
                                    <p class="name">Harvey Specter</p>                                   
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/rachelzane.png" alt="" />
                                <div class="meta">
                                    <p class="name">Rachel Zane</p>                                  
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/donnapaulsen.png" alt="" />
                                <div class="meta">
                                    <p class="name">Donna Paulsen</p>                                    
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/jessicapearson.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jessica Pearson</p>                                   
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/haroldgunderson.png" alt="" />
                                <div class="meta">
                                    <p class="name">Harold Gunderson</p>                                 
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/danielhardman.png" alt="" />
                                <div class="meta">
                                    <p class="name">Daniel Hardman</p>                                   
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">  
                                <img src="http://emilcarlsson.se/assets/katrinabennett.png" alt="" />
                                <div class="meta">
                                    <p class="name">Katrina Bennett</p>                                   
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/charlesforstman.png" alt="" />
                                <div class="meta">
                                    <p class="name">Charles Forstman</p>                                   
                                </div>
                            </div>
                        </li>
                        <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                         <li class="contact">
                            <div class="wrap">                               
                                <img src="http://emilcarlsson.se/assets/jonathansidwell.png" alt="" />
                                <div class="meta">
                                    <p class="name">Jonathan Sidwell</p>                                  
                                </div>
                            </div>
                        </li>
                        
                    
                    </ul>
                </div>
            </div>
            <div class="content">
                <div class="contact-profile">
                    <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                    <p>Harvey Specter</p>
                    <div class="social-media">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="messages">
                    <ul>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>How the hell am I supposed to get a jury to believe you when I am not even sure that I do?!</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>When you're backed against the wall, break the god damn thing down.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Excuses don't win championships.</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>Oh yeah, did Michael Jordan tell you that?</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>No, I told him that.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>What are your choices when someone puts a gun to your head?</p>
                        </li>
                        <li class="sent">
                            <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                            <p>What are you talking about? You do what they say or they shoot you.</p>
                        </li>
                        <li class="replies">
                            <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                            <p>Wrong. You take the gun, or you pull out a bigger one. Or, you call their bluff. Or, you do any one of a hundred and forty six other things.</p>
                        </li>
                    </ul>
                </div>
                <div class="message-input">
                    <div class="wrap">
                        <input type="text" placeholder="Write your message..." />
                        <button class="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" viewBox="0 0 36 41.998">
                            <path id="Sustracción_1" data-name="Sustracción 1" d="M-12130-16V-33.851l13-2.648-13-2.648V-58l36,21-36,21Z" transform="translate(12129.999 57.999)" fill="#e6e6e6"/>
                            </svg>

                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="col-lg-8">
             <div class="border-bottom"><img src="https://www.w3schools.com/howto/img_avatar.png" alt="" style="max-width: 55px;
                                             border-radius: 32px;"> <span>Fernando De Luna</span>
                 <span></span>
             </div>
             <br />
             <div class="border-bottom" style="background-color: rgba(95, 158, 160, 0.596); margin-right: 260px;
                  border-radius: 16px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum vero enim
                 totam dignissimos est
                 quis commodi dolorem, aspernatur soluta libero odio sit, fuga fugiat! Suscipit minima unde saepe
                 omnis debitis?
                 Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                 Unde alias nemo soluta dicta natus voluptatum quibusdam
                 debitis veritatis dignissimos sit, molestias impedit consequatur quaerat, asperiores maiores ad
                 accusamus, ab ullam?
             </div>
             <br>
             <div class="border-bottom" style="background-color: rgba(130, 216, 219, 0.596); margin-left: 260px;
                  border-radius: 16px;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum vero enim
                 totam dignissimos est
                 quis commodi dolorem, aspernatur soluta libero odio sit, fuga fugiat! Suscipit minima unde saepe
                 omnis debitis?
                 Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                 Unde alias nemo soluta dicta natus voluptatum quibusdam
                 debitis veritatis dignissimos sit, molestias impedit consequatur quaerat, asperiores maiores ad
                 accusamus, ab ullam?
             </div>
             <br />
             <div>
                 <textarea rows="4" cols="115"></textarea>
                 <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
                 <script type="text/javascript">
                     bkLib.onDomLoaded(nicEditors.allTextAreas);
                 </script>
             </div>


         </div>
     </div>

 </div>-->
        <script src='//production-assets.codepen.io/assets/common/stopExecutionOnTimeout-b2a7b3fe212eaa732349046d8416e00a9dec26eb7fd347590fbced3ab38af52e.js'></script><script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
        <script >$(".messages").animate({scrollTop: $(document).height()}, "fast");

            $("#profile-img").click(function () {
                $("#status-options").toggleClass("active");
            });

            $(".expand-button").click(function () {
                $("#profile").toggleClass("expanded");
                $("#contacts").toggleClass("expanded");
            });

            $("#status-options ul li").click(function () {
                $("#profile-img").removeClass();
                $("#status-online").removeClass("active");
                $("#status-away").removeClass("active");
                $("#status-busy").removeClass("active");
                $("#status-offline").removeClass("active");
                $(this).addClass("active");

                if ($("#status-online").hasClass("active")) {
                    $("#profile-img").addClass("online");
                } else if ($("#status-away").hasClass("active")) {
                    $("#profile-img").addClass("away");
                } else if ($("#status-busy").hasClass("active")) {
                    $("#profile-img").addClass("busy");
                } else if ($("#status-offline").hasClass("active")) {
                    $("#profile-img").addClass("offline");
                } else {
                    $("#profile-img").removeClass();
                }
                ;

                $("#status-options").removeClass("active");
            });

            function newMessage() {
                message = $(".message-input input").val();
                if ($.trim(message) == '') {
                    return false;
                }
                $('<li class="sent"><img src="http://emilcarlsson.se/assets/mikeross.png" alt="" /><p>' + message + '</p></li>').appendTo($('.messages ul'));
                $('.message-input input').val(null);
                $('.contact.active .preview').html('<span>You: </span>' + message);
                $(".messages").animate({scrollTop: $(document).height()}, "fast");
            }
            ;

            $('.submit').click(function () {
                newMessage();
            });

            $(window).on('keydown', function (e) {
                if (e.which == 13) {
                    newMessage();
                    return false;
                }
            });
            //# sourceURL=pen.js
        </script>
    </body>
</html>