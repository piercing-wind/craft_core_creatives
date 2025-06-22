<?php
$form_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : '';

    if ($name && $email && $message) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $to = "info@craftcorecreatives.com";
            $subject = "New Contact Form Submission";
            $headers = "From: $email\r\nReply-To: $email\r\n";
            $body = "Name: " . htmlspecialchars($name) . "\nEmail: " . htmlspecialchars($email) . "\n\nMessage:\n" . htmlspecialchars($message);

            if (mail($to, $subject, $body, $headers)) {
                $form_message = "<p style='color:green;'>Thank you! Your message has been sent.</p>";
            } else {
                $form_message = "<p style='color:red;'>Sorry, there was a problem sending your message. (Mail server error)</p>";
            }
        } else {
            $form_message = "<p style='color:red;'>Please enter a valid email address.</p>";
        }
    } else {
        $form_message = "<p style='color:red;'>Please fill in all required fields.</p>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Contact - Craft Core Creatives</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/global.css?v=8">
    
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body>
   <?php include 'header.php'; ?>
   <!--  -->
   <section class="w-full relative">
      <!-- Decorative background circles -->
      <div class="absolute w-[50vw] md:w-[40vw] top-0 right-0 h-72 md:h-96 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>
      <div class="absolute w-[40vw] md:w-[20vw] left-0 bottom-0 h-32 md:h-44 rounded-full bg-blue-600 opacity-50 blur-[80px] md:blur-[100px]"></div>

      <div class="max-w-5xl w-full mx-auto h-screen py-14 my-14">
         <h2 class="text-7xl font-normal uppercase mb-8 slideup-text text-center">Contact</span></h2>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center justify-items-center mt-24">
               <a href="#"><p class="mb-4">@craft_core_agency</p></a>
               <a href="#"><p class="mb-4">+91 947 825 1848</p></a>
               <a href="#"><p class="mb-4">info@craftcorecreatives.com</p></a>
         </div>
      
         <div class="w-full my-20 pb-28 p-4">
            <h6 class="text-xl font-normal uppercase mb-8 slideup-text">Fill out the form and we&apos;ll contact you!</span></h6>

            <form method="POST" action="">
              <div class="flex flex-col md:flex-row gap-8 justify-between bg-gradient-to-r from-neutral-800/50 to-transparent p-4 md:p-14 z-50">
                 <div class="flex-1 w-full flex flex-col gap-8">
                    <input required type="text" name="name" placeholder="Your Name" class="w-full p-4 mb-4 bg-transparent border-b">
                    <input required type="email" name="email" placeholder="Your Email" class="w-full p-4 mb-4 bg-transparent border-b">
                    <input required type="text" name="phone" placeholder="Your Phone" class="w-full p-4 mb-4 bg-transparent border-b">
                 </div>
                 <textarea required name="message" placeholder="Your Message" class="w-full min-h-40 flex-1 p-4 mb-4 bg-transparent border-b rounded-sm"></textarea>
              </div>
               <button type="submit" 
                  class="bg-gradient-to-b mt-14 from-blue-950 via-neutral-900 to-neutral-950 text-white px-14 py-2 rounded-full shadow shadow-[0_-2px_0_#97aac4] hover:from-purple-900 hover:to-neutral-900 transition-all duration-300 ease-in-out uppercase">
                  Send out
               </button>
            </form>

         </div>

      </div>





   </section>



   <!--  -->
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
</body>
</html>