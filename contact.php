<?php
$form_message = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : '';
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : '';
    $phone = isset($_POST["phone"]) ? trim($_POST["phone"]) : '';
    $message = isset($_POST["message"]) ? trim($_POST["message"]) : '';

   if ($name && $email && $message) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $to = "info@craftcorecreatives.com";
        $subject = "New Contact Form Submission";
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8\r\n";
        $headers .= "From: info@craftcorecreatives.com\r\nReply-To: $email\r\n";
        $body = "Name: " . htmlspecialchars($name) .
            "<br>Email: " . htmlspecialchars($email) .
            "<br>Phone: " . htmlspecialchars($phone) .
            "<br><br>Message:<br>" . nl2br(htmlspecialchars($message)) .
            "<br><br>-----------------------------<br>Website &amp; mail made by <a href=\"https://byteswithbits.com\" target=\"_blank\">Bytes With Bits</a>";
   
        if (mail($to, $subject, $body, $headers)) {
            $form_message = "<p style='color:green;'>Thank you! Your message has been sent.</p>";
        } else {
            $form_message = "<p style='color:red;'>Sorry, there was a problem sending your message. (Mail server error)</p>";
        }
    } else {
        $form_message = "<p style='color:red;'>Please enter a valid email address.</p>";
    }
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
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Contact Craft Core Creatives for design inquiries, project discussions, or to request a quote. We're here to help you with 3D modeling, product visualization, and creative solutions.">
    <meta name="keywords" content="Contact, Craft Core Creatives, Design Agency, 3D Modeling, Product Visualization, Creative Solutions, Project Inquiry">
    <meta name="author" content="Craft Core Creatives">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:title" content="Contact - Craft Core Creatives">
    <meta property="og:description" content="Get in touch with Craft Core Creatives for your design and creative needs.">
    <meta property="og:image" content="https://craftcorecreatives.com/images/og-image.jpg">
    <meta property="og:url" content="https://craftcorecreatives.com/contact.php">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Contact - Craft Core Creatives">
    <meta name="twitter:description" content="Get in touch with Craft Core Creatives for your design and creative needs.">
    <meta name="twitter:image" content="https://craftcorecreatives.com/images/og-image.jpg">

    <link rel="canonical" href="https://craftcorecreatives.com/contact.php">

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

      <div class="max-w-6xl w-full mx-auto min-h-screen py-14 my-14 z-20 relative">
         <h2 class="text-7xl font-normal uppercase mb-8 slideup-text text-center">Contact</span></h2>
         <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center justify-items-center mt-24 ">
               <a href="https://wa.me/918699373633?text=Hello%20Craft%20Core%20Creatives%2C%20I%20am%20interested%20in%20discussing%20a%20design%20project.%20Could%20you%20please%20provide%20more%20information%20about%20your%20services%3F" 
                  class="w-full flex gap-4 justify-center text-center hover:text-blue-600 hover:scale-[1.05] transition-all duration-300 ease-in-out"
                  target="_blank" rel="noopener noreferrer" title="Contact us on Whatsapp" aria-label="Contact us on Whatsapp" aria-describedby="whatsapp-icon"
                  >
                  <svg id="Capa_1" style="enable-background:new 0 0 90 90;" 
                     height="20px" width="20px"
                     version="1.1" viewBox="0 0 90 90" xml:space="preserve" 
                     fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <g><g>
                        <path d="M90,43.8c0,24.2-19.8,43.8-44.2,43.8c-7.7,0-15-2-21.4-5.5L0,90l8-23.5c-4-6.6-6.3-14.4-6.3-22.6     C1.6,19.6,21.4,0,45.8,0C70.2,0,90,19.6,90,43.8z M45.8,7C25.3,7,8.7,23.5,8.7,43.8c0,8.1,2.6,15.5,7.1,21.6l-4.6,13.7l14.3-4.5     c5.9,3.9,12.9,6.1,20.4,6.1C66.3,80.7,83,64.2,83,43.8S66.3,7,45.8,7z M68.1,53.9c-0.3-0.4-1-0.7-2.1-1.3     c-1.1-0.5-6.4-3.1-7.4-3.5c-1-0.4-1.7-0.5-2.4,0.5c-0.7,1.1-2.8,3.5-3.4,4.2c-0.6,0.7-1.3,0.8-2.3,0.3c-1.1-0.5-4.6-1.7-8.7-5.3     c-3.2-2.8-5.4-6.4-6-7.4c-0.6-1.1-0.1-1.7,0.5-2.2c0.5-0.5,1.1-1.3,1.6-1.9c0.5-0.6,0.7-1.1,1.1-1.8c0.4-0.7,0.2-1.3-0.1-1.9     c-0.3-0.5-2.4-5.8-3.3-8c-0.9-2.1-1.8-1.8-2.4-1.8c-0.6,0-1.4-0.1-2.1-0.1s-1.9,0.3-2.9,1.3c-1,1.1-3.8,3.7-3.8,9     c0,5.3,3.9,10.4,4.4,11.1c0.5,0.7,7.5,11.9,18.5,16.2c11,4.3,11,2.9,13,2.7c2-0.2,6.4-2.6,7.3-5.1C68.4,56.5,68.4,54.4,68.1,53.9     z" id="WhatsApp"/>
                     </g></g>
                  </svg>
                  <p class="">Whatsapp</p>
               </a>
               <a href="tel:+918699373633" 
                  class="w-full flex gap-4 justify-center text-center hover:text-blue-600 hover:scale-[1.05] transition-all duration-300 ease-in-out"
                  target="_blank" rel="noopener noreferrer" title="Contact us on Phone" aria-label="Contact us on Phone" aria-describedby="Phone-icon"
                  >
                  <svg enable-background="new 0 0 139 139" 
                     height="20px" id="Phone" version="1.1" viewBox="0 0 139 139" 
                     fill="currentColor"
                     width="20px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                     <path d="M67.317,81.952c-9.284-7.634-15.483-17.054-18.742-22.414l-2.431-4.583c0.85-0.912,7.332-7.853,10.141-11.619  c3.53-4.729-1.588-9-1.588-9S40.296,19.933,37.014,17.076c-3.282-2.861-7.06-1.272-7.06-1.272  c-6.898,4.457-14.049,8.332-14.478,26.968C15.46,60.22,28.705,78.216,43.028,92.148c14.346,15.734,34.043,31.504,53.086,31.486  c18.634-0.425,22.508-7.575,26.965-14.473c0,0,1.59-3.775-1.268-7.06c-2.86-3.284-17.265-17.688-17.265-17.688  s-4.268-5.119-8.998-1.586c-3.525,2.635-9.855,8.496-11.38,9.917C84.171,92.749,73.582,87.104,67.317,81.952z"/>
                  </svg>
                  <p class="">+91 869 937 3633</p>
               </a>
               <a href="mailto:info@craftcorecreatives.com" 
                  class="w-full flex gap-4 justify-center text-center hover:text-blue-600 hover:scale-[1.05] transition-all duration-300 ease-in-out"
                  target="_blank" rel="noopener noreferrer" title="Contact us on Phone" aria-label="Contact us on Phone" aria-describedby="Phone-icon"
                  >
                  <svg 
                   height="20px"
                   id="Layer_1" style="enable-background:new 0 0 56.7 56.7;" version="1.1" viewBox="0 0 56.7 56.7" width="20px" fill="currentColor"
                   xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  
                   <path d="M53.1719,14.5953l0.0011-0.0011l-0.0011,0.0008v-1.184c0-2.2468-1.8384-4.0852-4.0853-4.0852l-0.0012,0.0011l-0.0024,0.0018  l0.0036-0.0029H7.3962l0.0161,0.0131l-0.0161-0.012c-2.2468,0-4.0853,1.8384-4.0853,4.0853v27.9073  c0,2.2468,1.8384,4.0851,4.0853,4.0851h1.4543h38.6578v-0.001c4.2856-0.0498,5.5728-1.1102,5.6702-4.0809L53.1719,14.5953z   M46.0429,10.3258L28.1753,23.487L10.4239,10.3258H46.0429z M9.8608,20.5521l16.5508,11.4004l0.0166,0.0115L9.8513,43.4907  L9.8608,20.5521z M10.2886,44.4046l17.0151-11.8314l0.2985,0.2077c0.1716,0.1194,0.3714,0.1792,0.5712,0.1792  c0.1982,0,0.8773-0.39,0.8773-0.39l17.0197,11.8345H10.2886z M46.4973,43.4836L29.9305,31.9641l9.2394-6.3642l7.3274-5.0472V43.4836  z"/>
                  </svg>
                  <p class="">info@craftcorecreatives.com</p>
               </a>
         </div>
      

         <div class="w-full my-20 p-4">
            <h6 class="text-xl font-normal uppercase mb-8 slideup-text">Fill out the form and we&apos;ll contact you!</span></h6>
             <?php if (!empty($form_message)) echo $form_message; ?>
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

   <footer class="text-center text-xs py-8 border-t border-neutral-500 flex flex-col md:flex-row item-center justify-between px-4 md:px-8">
         <p>&copy; <?php echo date("Y"); ?> Craft Core Agency. All rights reserved.</p> 
         <p>Developed By <a href="https://byteswithbits.com" target="_blank" class="text-purple-600 font-semibold tracking-widest">BYTES WITH BITS</a></p>
   </footer>

   <!--  -->
   <script src="js/script.js"></script>
   <script src="js/animations.js"></script>
</body>
</html>