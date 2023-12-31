<!-- component -->
    <script>
        let cont = 0;

        function loopSlider(){
            let xx = setInterval(function () {
                switch (cont) {
                    case 0: {
                        $("#slider-1").fadeOut(400);
                        $("#slider-2").delay(400).fadeIn(400);
                        $("#sButton1").removeClass("bg-purple-800");
                        $("#sButton2").addClass("bg-purple-800");
                        cont = 1;

                        break;
                    }
                    case 1: {

                        $("#slider-2").fadeOut(400);
                        $("#slider-1").delay(400).fadeIn(400);
                        $("#sButton2").removeClass("bg-purple-800");
                        $("#sButton1").addClass("bg-purple-800");

                        cont = 0;

                        break;
                    }


                }
            }, 8000);

        }

        function reinitLoop(time){
            clearInterval(xx);
            setTimeout(loopSlider(),time);
        }



        function sliderButton1(){

            $("#slider-2").fadeOut(400);
            $("#slider-1").delay(400).fadeIn(400);
            $("#sButton2").removeClass("bg-purple-800");
            $("#sButton1").addClass("bg-purple-800");
            reinitLoop(4000);
            cont=0

        }

        function sliderButton2(){
            $("#slider-1").fadeOut(400);
            $("#slider-2").delay(400).fadeIn(400);
            $("#sButton1").removeClass("bg-purple-800");
            $("#sButton2").addClass("bg-purple-800");
            reinitLoop(4000);
            cont=1

        }

        $(window).ready(function(){
            $("#slider-2").hide();
            $("#sButton1").addClass("bg-purple-800");


            loopSlider();






        });


    </script>

<div class="sliderAx h-auto mt-24">
    <div id="slider-1" class="container mx-auto">
        <div class="bg-cover bg-center  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1530608031805-8e170c1b793a?q=80&w=1374&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
            <div class="text-background md:w-1/2 mb-10">
                <p class="font-bold text-sm uppercase">Services</p>
                <p class="text-3xl font-bold">Hello reviewer Welcome to Book Review</p>
                <p class="text-2xl mb-10 leading-none ">Find Your Favorite Book and Read it. Give your review and share it with your friends.</p>
            </div>
                <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>

        </div> <!-- container -->
        <br>
    </div>

    <div id="slider-2" class="container mx-auto ">
        <div class="bg-cover bg-top  h-auto text-white py-24 px-10 object-fill" style="background-image: url(https://images.unsplash.com/photo-1562932838-7a5b5d09f47a?q=80&w=1438&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D)">
            <div class="text-background md:w-1/2 mb-10">
            <p class="font-bold text-sm uppercase">Services</p>
            <p class="text-3xl font-bold">Hello reviewer Welcome to Book Review</p>
            <p class="text-2xl mb-10 leading-none ">Find Your Favorite Book and Read it. Give your review and share it with your friends.</p>
            </div>
            <a href="#" class="bg-purple-800 py-4 px-8 text-white font-bold uppercase text-xs rounded hover:bg-gray-200 hover:text-gray-800">Contact us</a>
        </div> <!-- container -->
        <br>
    </div>
</div>
<div  class="flex justify-between w-12 mx-auto pb-2">
    <button id="sButton1" onclick="sliderButton1()" class="bg-purple-400 rounded-full w-4 pb-2 " ></button>
    <button id="sButton2" onclick="sliderButton2() " class="bg-purple-400 rounded-full w-4 p-2"></button>
</div>


