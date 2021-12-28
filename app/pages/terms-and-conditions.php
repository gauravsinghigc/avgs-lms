<?php
require '../../require/modules.php';

//session controller for user 
if (isset($_SESSION['LOGIN_USER'])) {
 header("location: ../app/");
}

//page variabales
$pname = "Terms & Conditions";
?>
<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title><?php echo $pname; ?> | <?php echo $APP_NAME; ?></title>
 <?php
 //header files
 include '../../include/header_files.php';
 ?>
</head>

<body>
 <?php APP_BACK("auth/"); ?>
 <section class="container-fluid">
  <div class="row">
   <div class="col-md-12 text-justify text-para">
    <h5 class="mt-5-pr">Introduction</h5>
    <p class="text-grey">
     These Website Standard Terms and Conditions (these “Terms” or these “Website Standard Terms and Conditions”) contained herein on this webpage, shall govern your use of this website, including all pages within this website (collectively referred to herein below as this “Website”). These Terms apply in full force and effect to your use of this Website and by using this Website, you expressly accept all terms and conditions contained herein in full. You must not use this Website, if you have any objection to any of these Website Standard Terms and Conditions.
    </p>

    <h5>Intellectual Property Rights</h5>
    <p class="text-grey">
     Other than content you own, which you may have opted to include on this Website, under these Terms, “DigVetS” aka Yopun Solutions Pvt Ltd. and/or its licensors own all rights to the intellectual property and material contained in this Website, and all such rights are reserved. You are granted a limited license only, subject to the restrictions provided in these Terms, for purposes of viewing the material contained on this Website.
    </p>
    <h5>Restrictions</h5>
    <p class="text-grey">
     You are expressly and emphatically restricted from all of the following:<br>
     1. publishing any Website material in any media;<br>
     2. selling, sublicensing and/or otherwise commercializing any Website material;<br>
     3. publicly performing and/or showing any Website material;<br>
     4. using this Website in any way that is, or may be, damaging to this Website;<br>
     5. using this Website in any way that impacts user access to this Website;<br>
     6. using this Website contrary to applicable laws and regulations, or in a way that causes, or may cause, harm to the Website, or to any person or business entity;<br>
     7. engaging in any data mining, data harvesting, data extracting or any other similar activity in relation to this Website, or while using this Website;<br>
     8. using this Website to engage in any advertising or marketing;<br>
    </p>
    <p class="text-grey">
     Certain areas of this Website are restricted from access by you and “DigVetS” aka Yopun Solutions Pvt Ltd may further restrict access by you to any areas of this Website, at any time, in its sole and absolute discretion. Any user ID and password you may have for this Website are confidential and you must maintain confidentiality of such information.
    </p>
    <h5>Your Content</h5>
    <p class="text-grey">
     In these Website Standard Terms and Conditions, “Your Content” shall mean any audio, video, text, images or other material you choose to display on this Website. With respect to Your Content, by displaying it, you grant “DigVetS” aka Yopun Solutions Pvt Ltd. a non-exclusive, worldwide, irrevocable, royalty-free, sub-licensable license to use, reproduce, adapt, publish, translate and distribute it in any and all media.<br><br>
     Your Content must be your own and must not be infringing on any third party’s rights. “DigVetS” aka Yopun Solutions Pvt Ltd. reserves the right to remove any of Your Content from this Website at any time, and for any reason, without notice.
    </p>
    <h5>No warranties</h5>
    <p class="text-grey">
     This Website is provided “as is,” with all faults, and “DigVetS” aka Yopun Solutions Pvt Ltd. makes no express or implied representations or warranties, of any kind related to this Website or the materials contained on this Website. Additionally, nothing contained on this Website shall be construed as providing consult or advice to you.
    </p>
    <h5>Limitation of liability</h5>
    <p class="text-grey">
     In no event shall “DigVetS” aka Yopun Solutions Pvt Ltd., nor any of its officers, directors and employees, be liable to you for anything arising out of or in any way connected with your use of this Website, whether such liability is under contract, tort or otherwise, and “DigVetS” aka Yopun Solutions Pvt Ltd., including its officers, directors and employees shall not be liable for any indirect, consequential or special liability arising out of or in any way related to your use of this Website.
    </p>
    <h5>Indemnification</h5>
    <p class="text-grey">
     You hereby indemnify to the fullest extent “DigVetS” aka Yopun Solutions Pvt Ltd. from and against any and all liabilities, costs, demands, causes of action, damages and expenses (including reasonable attorney’s fees) arising out of or in any way related to your breach of any of the provisions of these Terms.
    </p>
    <h5>Severability</h5>
    <p class="text-grey">
     If any provision of these Terms is found to be unenforceable or invalid under any applicable law, such unenforceability or invalidity shall not render these Terms unenforceable or invalid as a whole, and such provisions shall be deleted without affecting the remaining provisions herein.
    </p>
    <h5> Variation of Terms</h5>
    <p class="text-grey">
     “DigVetS” aka Yopun Solutions Pvt Ltd. is permitted to revise these Terms at any time as it sees fit, and by using this Website you are expected to review such Terms on a regular basis to ensure you understand all terms and conditions governing use of this Website.
    </p>
    <h5>Assignment</h5>
    <p class="text-grey">
     “DigVetS” aka Yopun Solutions Pvt Ltd. shall be permitted to assign, transfer, and subcontract its rights and/or obligations under these Terms without any notification or consent required. However, .you shall not be permitted to assign, transfer, or subcontract any of your rights and/or obligations under these Terms.
    </p>
    <h5>Entire Agreement</h5>
    <p class="text-grey">
     These Terms, including any legal notices and disclaimers contained on this Website, constitute the entire agreement between “DigVetS” aka Yopun Solutions Pvt Ltd. and you in relation to your use of this Website, and supersede all prior agreements and understandings with respect to the same.
    </p>

    <h5>Governing Law & Jurisdiction</h5>
    <p class="text-grey mb-10-pr">
     These Terms will be governed by and construed in accordance with the laws of the State of Uttar Pradesh, and you submit to the non-exclusive jurisdiction of the state and federal courts located in Uttar Pradesh for the resolution of any disputes.
    </p>
    <p class="text-info mb-5-pr italic text-center"> End of <?php echo $pname; ?>
    </p>
   </div>
  </div>
 </section>
 <?php

 //message
 include '../../include/message.php';

 //footer
 include '../../include/footer.php';

 //footer files
 include '../../include/footer_files.php';
 ?>
</body>

</html>