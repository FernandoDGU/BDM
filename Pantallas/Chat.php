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
    <script type="text/javascript">
        $(document).ready(function(){
            <?php require("Procedimientos/userMensajes.php"); ?>
    
        });

    </script>

            <input id="txtId" type="text" value="<?php echo $idUser ?>" class="d-none invisible" name="idusariochats">
        <!-- <h1>Esta es una prueba en php para ver si jala esta madre </h1>
        
        <marquee direction="up">Este texto se mueve de abajo hacia arriba</marquee>
        <marquee direction="left">lalalal</marquee> -->
        <!-- SideBar -->
        <?php include("sidebar.php"); ?>
        <div id="frame">
            <div id="sidepanel">

                <div id="contacts">
                    <ul>
                    <?php ?>
                    <?php if ($rowuser == NULL) { ?>
                    
                    <?php }else{?>
                        <?php foreach($rowuser as $key => $value){?>
                        <li class="contact">
                            <div class="wrap">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <div class="meta">
                                    <p class="name"><?php echo $value['username']?></p>                                   
                                </div>
                            </div>
                        </li>
                        <?php }?>
                    <?php }?>
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
                            <!-- Mensaje del emisor  -->
                            <li class="sent">
                                <img src="http://emilcarlsson.se/assets/mikeross.png" alt="" />
                                <p>When you're backed against the wall, break the god damn thing down.</p>
                            </li>
                            <!-- Mensaje del receptor -->
                            <li class="replies">
                                <img src="http://emilcarlsson.se/assets/harveyspecter.png" alt="" />
                                <p>When you're backed against the wall, break the god damn thing down.</p>
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