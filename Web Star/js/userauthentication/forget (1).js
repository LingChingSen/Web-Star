// JavaScript Document
$(function () {
			$("#bgmodalForget").load("../html/userauthentication/forget.php");
        });

		/*Open Forget Form*/
        function openForgetForm() {
			document.querySelector(".bgmodalforget").style.display = "flex";
			
			document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
                
            var x=window.scrollX;
            var y=window.scrollY;
            window.onscroll=function(){window.scrollTo(x, y);};
        }

		/*Close Forget Form*/
        function closeForgetForm() {
            document.querySelector(".bgmodalforget").style.display = "none";
			document.forgetform.email.value = '';
			window.onscroll=function(){};
        }

        function forgetformValidation() {
            var email = document.forgetform.email;

            var val_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

            /*Email Format*/
            if (!email.value.match(val_email)) {
                alert("You have entered an invalid email address!");
                email.focus();
                return false;
            }
        }