<?php
include 'config_dbase.php';
//include 'config.php';
if($_POST["submit"]=='Continue')
{

$dvar['first_name']=$_POST['first_name'];
$dvar['last_name']=$_POST['last_name'];
$dvar['email']=$_POST['email'];
$dvar['phone_no']=$_POST['phone_no'];
$dvar['fax']=trim($_POST['fax']);
$dvar['company']=trim($_POST['company']);
$dvar['address']=$_POST['address'];
$dvar['city']=$_POST['city'];
$dvar['postcode']=$_POST['postcode'];
$dvar['country']=$_POST['country'];
$dvar['state']=$_POST['state'];
$dvar['password']=$_POST['password'];
$dvar['confirm']=$_POST['confirm'];
if($firstname=="")
{	
$msg="ERROR:Please enter first name";
 $response="error";	
}
elseif(!preg_match("/^[A-z]+$/",$firstname))
{
$msg="ERROR:Please enter valid first name";
 $response="error";	
}
elseif($lname=="")
{
$msg="ERROR:Please enter last name";
 $response="error";		
}
elseif(!preg_match("/^[A-z]+$/",$lname))
{
$msg="ERROR:Please enter valid last name";			
}
elseif($email=="")
{
$msg="ERROR:Please enter emailid";
 $response="error";
}
elseif(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/",$email))
{
$msg="email id format not correct";
 $response="error";		
}
elseif($telephone=="")
{

$msg="ERROR:Please enter mobileno";
 $response="error";
}
elseif(!preg_match("/^[0-9]+$/",$telephone))
{
$msg="ERROR:Please enter valid mobileno";
 $response="error";
}
elseif($address=="")
{

$msg="ERROR:Please enter address";
 $response="error";
}
elseif($city=="")
{

$msg="ERROR:Please enter city";
 $response="error";
}
elseif($postcode=="")
{

$msg="ERROR:Please enter post code";
 $response="error";
}
elseif($country=="")
{

$msg="ERROR:Please enter country";
 $response="error";
}
elseif($state=="")
{

$msg="ERROR:Please enter state";
}
elseif($password=="")
{
$msg="Error:Please Enter password";

}
elseif(!preg_match("/^[0-9a-zA-Z]+$/",$pass))
{
$msg="Error:Please Enter valid password";
		
}
elseif($cpassword=="")
{
$msg="Error:Please Enter confirm password";

}
else
	{
		echo "hhgffd";
	}

}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
<meta charset="UTF-8" />
<title>Register - Polishop eCommerce HTML Template</title>
<?php include"include/head.php" ?>
</head>
<body>
<div class="wrapper-box">
  <div class="main-wrapper">
    <!--Header Part Start-->
     <?php include"include/header.php" ?>
    <!--Header Part End-->
    <div id="container">
      <!--Left Part-->
      <div id="column-left">
        <!--Account Links Start-->
        <div class="box">
          <div class="box-heading">Account</div>
          <div class="box-content">
            <ul class="list-item">
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="#">Forgotten Password</a></li>
              <li><a href="#">My Account</a></li>
              <li><a href="#">Wish List</a></li>
              <li><a href="#">Order History</a></li>
              <li><a href="#">Downloads</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="#">Transactions</a></li>
              <li><a href="#">Newsletter</a></li>
            </ul>
          </div>
        </div>
        <!--Account Links End-->
        <!--Latest Product Start-->
        <div class="box">
          <div class="box-heading">Latest</div>
          <div class="box-content">
            <div class="box-product">
              <div class="flexslider">
                <ul class="slides">
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/sony_vaio_1-45x45.jpg" alt="Friendly Jewelry" /></a></div>
                      <div class="name"><a href="product.html">Friendly Jewelry</a></div>
                      <div class="price">$1,177.00</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/apple_cinema_30-45x45.jpg" alt="Apple Cinema 30&quot;" /></a></div>
                      <div class="name"><a href="product.html">Apple Cinema 30&quot;</a></div>
                      <div class="price"><span class="price-old">$119.50</span> <span class="price-new">$107.75</span></div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/ipod_classic_1-45x45.jpg" alt="iPad Classic" /></a></div>
                      <div class="name"><a href="product.html">iPad Classic</a></div>
                      <div class="price">$119.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/lotto-sports-shoes-white-45x45.jpg" alt="Lotto Sports Shoes" /></a></div>
                      <div class="name"><a href="product.html">Lotto Sports Shoes</a></div>
                      <div class="price">$589.50</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                  <li>
                    <div class="slide-inner">
                      <div class="image"><a href="product.html"><img src="image/product/Jeep-Casual-Shoes-45x45.jpg" alt="Jeep-Casual-Shoes" /></a></div>
                      <div class="name"><a href="product.html">Jeep-Casual-Shoes</a></div>
                      <div class="price">$131.25</div>
                      <div class="clear"></div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!--Latest Product End-->
      </div>
      <!--Left End-->
      <!--Middle Part Start-->
      <div id="content">
        <!--Breadcrumb Part Start-->
        <div class="breadcrumb"> <a href="index-2.html">Home</a> » <a href="#">Account</a> » <a href="register.html">Register</a> </div>
        <!--Breadcrumb Part End-->
        <h1>Register Account</h1>
         <div style="border:0px solid black; width:auto; height:auto; font-size:12px;"><?php
					  //msg for printing error
						if(isset($msg) && $msg <> "" && $response=="error"){
						echo "<div style='color:red; font-size:15px;'>".$msg."</div>";
						}
						if(isset($msg) && $msg <> "" && $response=="success")
						{echo "<div style='color:green; font-size:15px;'>".$msg."</div>";}
						
						?></div>
       
        <form  method="post" action="#">
          <h2>Your Personal Details</h2>
          
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> First Name:</td>
                  <td><input class="large-field" type="text" value="" name="fname"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Last Name:</td>
                  <td><input class="large-field" type="text" value="" name="lname"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> E-Mail:</td>
                  <td><input class="large-field" type="text" value="" name="email"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Telephone:</td>
                  <td><input class="large-field" type="text" value="" name="telephone"></td>
                </tr>
                <tr>
                  <td>Fax:</td>
                  <td><input class="large-field" type="text" value="" name="fax"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Your Address</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td>Company:</td>
                  <td><input class="large-field" type="text" value="" name="company"></td>
                </tr>
                <tr id="company-id-display">
                  <td>Company ID:</td>
                  <td><input class="large-field" type="text" value="" name="company_id"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Address 1:</td>
                  <td><input class="large-field" type="text" value="" name="address"></td>
                </tr>
                <tr>
                  <td>Address 2:</td>
                  <td><input class="large-field" type="text" value="" name="address_2"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> City:</td>
                  <td><input class="large-field" type="text" value="" name="city"></td>
                </tr>
                <tr>
                  <td><span class="required" id="postcode-required">*</span> Post Code:</td>
                  <td><input class="large-field" type="text" value="" name="postcode"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Country:</td>
                  <td><select name="country_id">
                      <option value=""> --- Please Select --- </option>
                      <option value="244">Aaland Islands</option>
                      <option value="1">Afghanistan</option>
                      <option value="2">Albania</option>
                      <option value="3">Algeria</option>
                      <option value="4">American Samoa</option>
                      <option value="5">Andorra</option>
                      <option value="6">Angola</option>
                      <option value="7">Anguilla</option>
                      <option value="8">Antarctica</option>
                      <option value="9">Antigua and Barbuda</option>
                      <option value="10">Argentina</option>
                      <option value="11">Armenia</option>
                      <option value="12">Aruba</option>
                      <option value="13">Australia</option>
                      <option value="14">Austria</option>
                      <option value="15">Azerbaijan</option>
                      <option value="16">Bahamas</option>
                      <option value="17">Bahrain</option>
                      <option value="18">Bangladesh</option>
                      <option value="19">Barbados</option>
                      <option value="20">Belarus</option>
                      <option value="21">Belgium</option>
                      <option value="22">Belize</option>
                      <option value="23">Benin</option>
                      <option value="24">Bermuda</option>
                      <option value="25">Bhutan</option>
                      <option value="26">Bolivia</option>
                      <option value="245">Bonaire, Sint Eustatius and Saba</option>
                      <option value="27">Bosnia and Herzegovina</option>
                      <option value="28">Botswana</option>
                      <option value="29">Bouvet Island</option>
                      <option value="30">Brazil</option>
                      <option value="31">British Indian Ocean Territory</option>
                      <option value="32">Brunei Darussalam</option>
                      <option value="33">Bulgaria</option>
                      <option value="34">Burkina Faso</option>
                      <option value="35">Burundi</option>
                      <option value="36">Cambodia</option>
                      <option value="37">Cameroon</option>
                      <option value="38">Canada</option>
                      <option value="251">Canary Islands</option>
                      <option value="39">Cape Verde</option>
                      <option value="40">Cayman Islands</option>
                      <option value="41">Central African Republic</option>
                      <option value="42">Chad</option>
                      <option value="43">Chile</option>
                      <option value="44">China</option>
                      <option value="45">Christmas Island</option>
                      <option value="46">Cocos (Keeling) Islands</option>
                      <option value="47">Colombia</option>
                      <option value="48">Comoros</option>
                      <option value="49">Congo</option>
                      <option value="50">Cook Islands</option>
                      <option value="51">Costa Rica</option>
                      <option value="52">Cote D'Ivoire</option>
                      <option value="53">Croatia</option>
                      <option value="54">Cuba</option>
                      <option value="246">Curacao</option>
                      <option value="55">Cyprus</option>
                      <option value="56">Czech Republic</option>
                      <option value="237">Democratic Republic of Congo</option>
                      <option value="57">Denmark</option>
                      <option value="58">Djibouti</option>
                      <option value="59">Dominica</option>
                      <option value="60">Dominican Republic</option>
                      <option value="61">East Timor</option>
                      <option value="62">Ecuador</option>
                      <option value="63">Egypt</option>
                      <option value="64">El Salvador</option>
                      <option value="65">Equatorial Guinea</option>
                      <option value="66">Eritrea</option>
                      <option value="67">Estonia</option>
                      <option value="68">Ethiopia</option>
                      <option value="69">Falkland Islands (Malvinas)</option>
                      <option value="70">Faroe Islands</option>
                      <option value="71">Fiji</option>
                      <option value="72">Finland</option>
                      <option value="74">France, Metropolitan</option>
                      <option value="75">French Guiana</option>
                      <option value="76">French Polynesia</option>
                      <option value="77">French Southern Territories</option>
                      <option value="126">FYROM</option>
                      <option value="78">Gabon</option>
                      <option value="79">Gambia</option>
                      <option value="80">Georgia</option>
                      <option value="81">Germany</option>
                      <option value="82">Ghana</option>
                      <option value="83">Gibraltar</option>
                      <option value="84">Greece</option>
                      <option value="85">Greenland</option>
                      <option value="86">Grenada</option>
                      <option value="87">Guadeloupe</option>
                      <option value="88">Guam</option>
                      <option value="89">Guatemala</option>
                      <option value="241">Guernsey</option>
                      <option value="90">Guinea</option>
                      <option value="91">Guinea-Bissau</option>
                      <option value="92">Guyana</option>
                      <option value="93">Haiti</option>
                      <option value="94">Heard and Mc Donald Islands</option>
                      <option value="95">Honduras</option>
                      <option value="96">Hong Kong</option>
                      <option value="97">Hungary</option>
                      <option value="98">Iceland</option>
                      <option value="99">India</option>
                      <option value="100">Indonesia</option>
                      <option value="101">Iran (Islamic Republic of)</option>
                      <option value="102">Iraq</option>
                      <option value="103">Ireland</option>
                      <option value="104">Israel</option>
                      <option value="105">Italy</option>
                      <option value="106">Jamaica</option>
                      <option value="107">Japan</option>
                      <option value="240">Jersey</option>
                      <option value="108">Jordan</option>
                      <option value="109">Kazakhstan</option>
                      <option value="110">Kenya</option>
                      <option value="111">Kiribati</option>
                      <option value="113">Korea, Republic of</option>
                      <option value="114">Kuwait</option>
                      <option value="115">Kyrgyzstan</option>
                      <option value="116">Lao People's Democratic Republic</option>
                      <option value="117">Latvia</option>
                      <option value="118">Lebanon</option>
                      <option value="119">Lesotho</option>
                      <option value="120">Liberia</option>
                      <option value="121">Libyan Arab Jamahiriya</option>
                      <option value="122">Liechtenstein</option>
                      <option value="123">Lithuania</option>
                      <option value="124">Luxembourg</option>
                      <option value="125">Macau</option>
                      <option value="127">Madagascar</option>
                      <option value="128">Malawi</option>
                      <option value="129">Malaysia</option>
                      <option value="130">Maldives</option>
                      <option value="131">Mali</option>
                      <option value="132">Malta</option>
                      <option value="133">Marshall Islands</option>
                      <option value="134">Martinique</option>
                      <option value="135">Mauritania</option>
                      <option value="136">Mauritius</option>
                      <option value="137">Mayotte</option>
                      <option value="138">Mexico</option>
                      <option value="139">Micronesia, Federated States of</option>
                      <option value="140">Moldova, Republic of</option>
                      <option value="141">Monaco</option>
                      <option value="142">Mongolia</option>
                      <option value="242">Montenegro</option>
                      <option value="143">Montserrat</option>
                      <option value="144">Morocco</option>
                      <option value="145">Mozambique</option>
                      <option value="146">Myanmar</option>
                      <option value="147">Namibia</option>
                      <option value="148">Nauru</option>
                      <option value="149">Nepal</option>
                      <option value="150">Netherlands</option>
                      <option value="151">Netherlands Antilles</option>
                      <option value="152">New Caledonia</option>
                      <option value="153">New Zealand</option>
                      <option value="154">Nicaragua</option>
                      <option value="155">Niger</option>
                      <option value="156">Nigeria</option>
                      <option value="157">Niue</option>
                      <option value="158">Norfolk Island</option>
                      <option value="112">North Korea</option>
                      <option value="159">Northern Mariana Islands</option>
                      <option value="160">Norway</option>
                      <option value="161">Oman</option>
                      <option value="162">Pakistan</option>
                      <option value="163">Palau</option>
                      <option value="247">Palestinian Territory, Occupied</option>
                      <option value="164">Panama</option>
                      <option value="165">Papua New Guinea</option>
                      <option value="166">Paraguay</option>
                      <option value="167">Peru</option>
                      <option value="168">Philippines</option>
                      <option value="169">Pitcairn</option>
                      <option value="170">Poland</option>
                      <option value="171">Portugal</option>
                      <option value="172">Puerto Rico</option>
                      <option value="173">Qatar</option>
                      <option value="174">Reunion</option>
                      <option value="175">Romania</option>
                      <option value="176">Russian Federation</option>
                      <option value="177">Rwanda</option>
                      <option value="178">Saint Kitts and Nevis</option>
                      <option value="179">Saint Lucia</option>
                      <option value="180">Saint Vincent and the Grenadines</option>
                      <option value="181">Samoa</option>
                      <option value="182">San Marino</option>
                      <option value="183">Sao Tome and Principe</option>
                      <option value="184">Saudi Arabia</option>
                      <option value="185">Senegal</option>
                      <option value="243">Serbia</option>
                      <option value="186">Seychelles</option>
                      <option value="187">Sierra Leone</option>
                      <option value="188">Singapore</option>
                      <option value="189">Slovak Republic</option>
                      <option value="190">Slovenia</option>
                      <option value="191">Solomon Islands</option>
                      <option value="192">Somalia</option>
                      <option value="193">South Africa</option>
                      <option value="194">South Georgia &amp; South Sandwich Islands</option>
                      <option value="248">South Sudan</option>
                      <option value="195">Spain</option>
                      <option value="196">Sri Lanka</option>
                      <option value="249">St. Barthelemy</option>
                      <option value="197">St. Helena</option>
                      <option value="250">St. Martin (French part)</option>
                      <option value="198">St. Pierre and Miquelon</option>
                      <option value="199">Sudan</option>
                      <option value="200">Suriname</option>
                      <option value="201">Svalbard and Jan Mayen Islands</option>
                      <option value="202">Swaziland</option>
                      <option value="203">Sweden</option>
                      <option value="204">Switzerland</option>
                      <option value="205">Syrian Arab Republic</option>
                      <option value="206">Taiwan</option>
                      <option value="207">Tajikistan</option>
                      <option value="208">Tanzania, United Republic of</option>
                      <option value="209">Thailand</option>
                      <option value="210">Togo</option>
                      <option value="211">Tokelau</option>
                      <option value="212">Tonga</option>
                      <option value="213">Trinidad and Tobago</option>
                      <option value="214">Tunisia</option>
                      <option value="215">Turkey</option>
                      <option value="216">Turkmenistan</option>
                      <option value="217">Turks and Caicos Islands</option>
                      <option value="218">Tuvalu</option>
                      <option value="219">Uganda</option>
                      <option value="220">Ukraine</option>
                      <option value="221">United Arab Emirates</option>
                      <option selected="selected" value="222">United Kingdom</option>
                      <option value="223">United States</option>
                      <option value="224">United States Minor Outlying Islands</option>
                      <option value="225">Uruguay</option>
                      <option value="226">Uzbekistan</option>
                      <option value="227">Vanuatu</option>
                      <option value="228">Vatican City State (Holy See)</option>
                      <option value="229">Venezuela</option>
                      <option value="230">Viet Nam</option>
                      <option value="231">Virgin Islands (British)</option>
                      <option value="232">Virgin Islands (U.S.)</option>
                      <option value="233">Wallis and Futuna Islands</option>
                      <option value="234">Western Sahara</option>
                      <option value="235">Yemen</option>
                      <option value="238">Zambia</option>
                      <option value="239">Zimbabwe</option>
                    </select></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Region / State:</td>
                  <td><select name="zone_id">
                      <option value=""> --- Please Select --- </option>
                      <option value="3513">Aberdeen</option>
                      <option value="3514">Aberdeenshire</option>
                      <option value="3515">Anglesey</option>
                      <option value="3516">Angus</option>
                      <option value="3517">Argyll and Bute</option>
                      <option value="3518">Bedfordshire</option>
                      <option value="3519">Berkshire</option>
                      <option value="3520">Blaenau Gwent</option>
                      <option value="3521">Bridgend</option>
                      <option value="3522">Bristol</option>
                      <option value="3523">Buckinghamshire</option>
                      <option value="3524">Caerphilly</option>
                      <option value="3525">Cambridgeshire</option>
                      <option value="3526">Cardiff</option>
                      <option value="3527">Carmarthenshire</option>
                      <option value="3528">Ceredigion</option>
                      <option value="3529">Cheshire</option>
                      <option value="3530">Clackmannanshire</option>
                      <option value="3531">Conwy</option>
                      <option value="3532">Cornwall</option>
                      <option value="3949">County Antrim</option>
                      <option value="3950">County Armagh</option>
                      <option value="3951">County Down</option>
                      <option value="3952">County Fermanagh</option>
                      <option value="3953">County Londonderry</option>
                      <option value="3954">County Tyrone</option>
                      <option value="3955">Cumbria</option>
                      <option value="3533">Denbighshire</option>
                      <option value="3534">Derbyshire</option>
                      <option value="3535">Devon</option>
                      <option value="3536">Dorset</option>
                      <option value="3537">Dumfries and Galloway</option>
                      <option value="3538">Dundee</option>
                      <option value="3539">Durham</option>
                      <option value="3540">East Ayrshire</option>
                      <option value="3541">East Dunbartonshire</option>
                      <option value="3542">East Lothian</option>
                      <option value="3543">East Renfrewshire</option>
                      <option value="3544">East Riding of Yorkshire</option>
                      <option value="3545">East Sussex</option>
                      <option value="3546">Edinburgh</option>
                      <option value="3547">Essex</option>
                      <option value="3548">Falkirk</option>
                      <option value="3549">Fife</option>
                      <option value="3550">Flintshire</option>
                      <option value="3551">Glasgow</option>
                      <option value="3552">Gloucestershire</option>
                      <option value="3553">Greater London</option>
                      <option value="3554">Greater Manchester</option>
                      <option value="3555">Gwynedd</option>
                      <option value="3556">Hampshire</option>
                      <option value="3557">Herefordshire</option>
                      <option value="3558">Hertfordshire</option>
                      <option value="3559">Highlands</option>
                      <option value="3560">Inverclyde</option>
                      <option value="3972">Isle of Man</option>
                      <option value="3561">Isle of Wight</option>
                      <option value="3562">Kent</option>
                      <option value="3563">Lancashire</option>
                      <option value="3564">Leicestershire</option>
                      <option value="3565">Lincolnshire</option>
                      <option value="3566">Merseyside</option>
                      <option value="3567">Merthyr Tydfil</option>
                      <option value="3568">Midlothian</option>
                      <option value="3569">Monmouthshire</option>
                      <option value="3570">Moray</option>
                      <option value="3571">Neath Port Talbot</option>
                      <option value="3572">Newport</option>
                      <option value="3573">Norfolk</option>
                      <option value="3574">North Ayrshire</option>
                      <option value="3575">North Lanarkshire</option>
                      <option value="3576">North Yorkshire</option>
                      <option value="3577">Northamptonshire</option>
                      <option value="3578">Northumberland</option>
                      <option value="3579">Nottinghamshire</option>
                      <option value="3580">Orkney Islands</option>
                      <option value="3581">Oxfordshire</option>
                      <option value="3582">Pembrokeshire</option>
                      <option value="3583">Perth and Kinross</option>
                      <option value="3584">Powys</option>
                      <option value="3585">Renfrewshire</option>
                      <option value="3586">Rhondda Cynon Taff</option>
                      <option value="3587">Rutland</option>
                      <option value="3588">Scottish Borders</option>
                      <option value="3589">Shetland Islands</option>
                      <option value="3590">Shropshire</option>
                      <option value="3591">Somerset</option>
                      <option value="3592">South Ayrshire</option>
                      <option value="3593">South Lanarkshire</option>
                      <option value="3594">South Yorkshire</option>
                      <option value="3595">Staffordshire</option>
                      <option value="3596">Stirling</option>
                      <option value="3597">Suffolk</option>
                      <option value="3598">Surrey</option>
                      <option value="3599">Swansea</option>
                      <option value="3600">Torfaen</option>
                      <option value="3601">Tyne and Wear</option>
                      <option value="3602">Vale of Glamorgan</option>
                      <option value="3603">Warwickshire</option>
                      <option value="3604">West Dunbartonshire</option>
                      <option value="3605">West Lothian</option>
                      <option value="3606">West Midlands</option>
                      <option value="3607">West Sussex</option>
                      <option value="3608">West Yorkshire</option>
                      <option value="3609">Western Isles</option>
                      <option value="3610">Wiltshire</option>
                      <option value="3611">Worcestershire</option>
                      <option value="3612">Wrexham</option>
                    </select></td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Your Password</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td><span class="required">*</span> Password:</td>
                  <td><input class="large-field" type="password" value="" name="password"></td>
                </tr>
                <tr>
                  <td><span class="required">*</span> Password Confirm:</td>
                  <td><input class="large-field" type="password" value="" name="cpassword"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <h2>Newsletter</h2>
          <div class="content">
            <table class="form">
              <tbody>
                <tr>
                  <td>Subscribe:</td>
                  <td><input type="radio" value="1" name="newsletter">
                    Yes
                    <input type="radio" checked="checked" value="0" name="newsletter">
                    No </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="buttons">
            <div class="left">
              <p>
                <input type="checkbox" value="1" name="agree">
                &nbsp; I have read and agree to the <a alt="Privacy Policy" href="#" class="colorbox cboxElement"><b>Privacy Policy</b></a> </p>
              <input type="submit" class="button" value="Continue" name="submit">
            </div>
          </div>
        </form>
      </div>
      <!--Middle Part End-->
      <div class="clear"></div>
    </div>
  </div>
  <!--Footer Part Start-->
   <?php include"include/footer.php" ?>
  <!--Footer Part End-->
</div>
</body>
</html>