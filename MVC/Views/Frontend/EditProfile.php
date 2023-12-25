
<div class="alert-message"><p>Thay đổi thành công!</p></div>
    
    <!-- <ul class="actions">
        <li class="save" id="save">
            <i class="fa-solid fa-floppy-disk save-icon"></i>
            <span>Lưu</span>
        </li>
        <li class="set-back" id="set-back">
            <i class="fa-solid fa-arrow-rotate-left set-back-icon"></i>
            <a href="index.php?controller=Imey&action=EditProfile"><span style="color: black;">Thiết lập lại</span></a>
        </li>
    </ul> -->
        <div class="edit-navigation">
            <a class="edit-file" href="#">Chỉnh sửa hồ sơ</a>
            <a class="edit-acc" href="#edit-account">Quản lí tài khoản</a>
            <!-- <p>Chỉnh sủa tài khoản</p> -->
        </div>
    <div class="container">
        <div class="edit">
        <form action="#" id="edit-profile-form">
            <div class="edit-profile" id="edit-profile">
                <h3>Thông tin cơ bản</h3>
                
                    <div class="edit-avatar">
                        <div class="user-avatar-img-container">
                            <img src="/Public/profileimg/<?php echo $avatar; ?>" alt="" class="user-avatar" id="user-avatar">
                        </div>
                        <p class="change-avatar-btn" id="change-avatar-btn"><i class="fa-solid fa-camera"></i> Thay đổi</p>
                        <input type="file" name="avatar-file" class="avatar-file" id="avatar-file" value="<?php echo $avatar; ?>">
                    </div>
                    
                    <!-- <div>
                        <label for="username" class="firstname">Tên tài khoản</label>
                        <input type="text" name="username" class="username" id="username" value="<?php echo $_SESSION['Login']['username'] ?>" hidden>
                    </div> -->
                        <div>
                            <label for="email">Email<span class="essential">*</span></label>
                            <input type="email" name="email" id="email" value="<?php echo $data['UserData']['Email']; ?>" required
                            >
                        </div>
                    <div style="display: flex;">
                        <div>
                            <label for="firstname">Tên</label>
                            <input type="text" name="firstname" class="firstname" id="firstname" value="<?php echo $data['UserData']['Firstname']; ?>">
                        </div>
                        <div style="margin-left: 20px;">
                            <label for="lastname">Họ</label>
                            <input type="text" name="lastname" class="lastname" id="lastname" value="<?php echo $data['UserData']['Lastname']; ?>">
                        </div>
                    </div>
                    <div>
                        <label for="ocupation">Nghề nghiệp</label>
                        <input type="text" name="ocupation" class="ocupation" id="ocupation" value="<?php echo $data['UserData']['Ocupation']; ?>">
                    </div>
                    <div>
                        <label for="location">Vị trí</label>
                        <div class="main-box" onclick="toggleOptions()">
                            <input type="text" name="location" class="location" id="location" value="<?php echo $data['UserData']['Location']; ?>">
                            <i class="fa-solid fa-caret-down down-click"></i>
                        </div>
                        <div class="options">
                                <div class="option" onclick="selectOption(1)">United States</div>
                                <div class="option" onclick="selectOption(2)">Afghanistan</div>
                                <div class="option" onclick="selectOption(3)">Aland Islands</div>
                                <div class="option" onclick="selectOption(4)">Albania</div>
                                <div class="option" onclick="selectOption(5)">Algeria</div>
                                <div class="option" onclick="selectOption(6)">American Samoa</div>
                                <div class="option" onclick="selectOption(7)">Andorra</div>
                                <div class="option" onclick="selectOption(8)">Angola</div>
                                <div class="option" onclick="selectOption(9)">Anguilla</div>
                                <div class="option" onclick="selectOption(10)">Antarctica</div>
                                <div class="option" onclick="selectOption(11)">Antigua and Barbuda</div>
                                <div class="option" onclick="selectOption(12)">Argentina</div>
                                <div class="option" onclick="selectOption(13)">Armenia</div>
                                <div class="option" onclick="selectOption(14)">Aruba</div>
                                <div class="option" onclick="selectOption(15)">Australia</div>
                                <div class="option" onclick="selectOption(16)">Austria</div>
                                <div class="option" onclick="selectOption(17)">Azerbaijan</div>
                                <div class="option" onclick="selectOption(18)">Bahamas</div>
                                <div class="option" onclick="selectOption(19)">Bahrain</div>
                                <div class="option" onclick="selectOption(20)">Bangladesh</div>
                                <div class="option" onclick="selectOption(21)">Barbados</div>
                                <div class="option" onclick="selectOption(22)">Belarus</div>
                                <div class="option" onclick="selectOption(23)">Belgium</div>
                                <div class="option" onclick="selectOption(24)">Belize</div>
                                <div class="option" onclick="selectOption(25)">Benin</div>
                                <div class="option" onclick="selectOption(26)">Bermuda</div>
                                <div class="option" onclick="selectOption(27)">Bhutan</div>
                                <div class="option" onclick="selectOption(28)">Bolivia</div>
                                <div class="option" onclick="selectOption(29)">Bonaire, Saint Eustatius and Saba</div>
                                <div class="option" onclick="selectOption(30)">Bosnia and Herzegovina</div>
                                <div class="option" onclick="selectOption(31)">Botswana</div>
                                <div class="option" onclick="selectOption(32)">Brazil</div>
                                <div class="option" onclick="selectOption(33)">British Indian Ocean Territory</div>
                                <div class="option" onclick="selectOption(34)">Brunei Darussalam</div>
                                <div class="option" onclick="selectOption(35)">Bulgaria</div>
                                <div class="option" onclick="selectOption(36)">Burkina Faso</div>
                                <div class="option" onclick="selectOption(37)">Burundi</div>
                                <div class="option" onclick="selectOption(38)">Cambodia</div>
                                <div class="option" onclick="selectOption(39)">Cameroon</div>
                                <div class="option" onclick="selectOption(40)">Canada</div>
                                <div class="option" onclick="selectOption(41)">Cape Verde</div>
                                <div class="option" onclick="selectOption(42)">Cayman Islands</div>
                                <div class="option" onclick="selectOption(43)">Central African Republic</div>
                                <div class="option" onclick="selectOption(44)">Chad</div>
                                <div class="option" onclick="selectOption(45)">Chile</div>
                                <div class="option" onclick="selectOption(46)">China</div>
                                <div class="option" onclick="selectOption(47)">Christmas Island</div>
                                <div class="option" onclick="selectOption(48)">Cocos (Keeling) Islands</div>
                                <div class="option" onclick="selectOption(49)">Colombia</div>
                                <div class="option" onclick="selectOption(50)">Comoros</div>
                                <div class="option" onclick="selectOption(51)">Congo</div>
                                <div class="option" onclick="selectOption(52)">Cook Islands</div>
                                <div class="option" onclick="selectOption(53)">Costa Rica</div>
                                <div class="option" onclick="selectOption(54)">Cote d'Ivoire</div>
                                <div class="option" onclick="selectOption(55)">Croatia</div>
                                <div class="option" onclick="selectOption(56)">Cuba</div>
                                <div class="option" onclick="selectOption(57)">Curacao</div>
                                <div class="option" onclick="selectOption(58)">Cyprus</div>
                                <div class="option" onclick="selectOption(59)">Czech Republic</div>
                                <div class="option" onclick="selectOption(60)">Denmark</div>
                                <div class="option" onclick="selectOption(61)">Djibouti</div>
                                <div class="option" onclick="selectOption(62)">Dominica</div>
                                <div class="option" onclick="selectOption(63)">Dominican Republic</div>
                                <div class="option" onclick="selectOption(64)">Ecuador</div>
                                <div class="option" onclick="selectOption(65)">Egypt</div>
                                <div class="option" onclick="selectOption(66)">El Salvador</div>
                                <div class="option" onclick="selectOption(67)">Equatorial Guinea</div>
                                <div class="option" onclick="selectOption(68)">Eritrea</div>
                                <div class="option" onclick="selectOption(69)">Estonia</div>
                                <div class="option" onclick="selectOption(70)">Ethiopia</div>
                                <div class="option" onclick="selectOption(71)">Falkland Islands (Malvinas)</div>
                                <div class="option" onclick="selectOption(72)">Faroe Islands</div>
                                <div class="option" onclick="selectOption(73)">Fiji</div>
                                <div class="option" onclick="selectOption(74)">Finland</div>
                                <div class="option" onclick="selectOption(75)">France</div>
                                <div class="option" onclick="selectOption(76)">French Guiana</div>
                                <div class="option" onclick="selectOption(77)">French Polynesia</div>
                                <div class="option" onclick="selectOption(78)">French Southern Territories</div>
                                <div class="option" onclick="selectOption(79)">Gabon</div>
                                <div class="option" onclick="selectOption(80)">Gambia</div>
                                <div class="option" onclick="selectOption(81)">Georgia</div>
                                <div class="option" onclick="selectOption(82)">Germany</div>
                                <div class="option" onclick="selectOption(83)">Ghana</div>
                                <div class="option" onclick="selectOption(84)">Gibraltar</div>
                                <div class="option" onclick="selectOption(85)">Greece</div>
                                <div class="option" onclick="selectOption(86)">Greenland</div>
                                <div class="option" onclick="selectOption(87)">Grenada</div>
                                <div class="option" onclick="selectOption(88)">Guadeloupe</div>
                                <div class="option" onclick="selectOption(89)">Guam</div>
                                <div class="option" onclick="selectOption(90)">Guatemala</div>
                                <div class="option" onclick="selectOption(91)">Guernsey</div>
                                <div class="option" onclick="selectOption(92)">Guinea</div>
                                <div class="option" onclick="selectOption(93)">Guinea-Bissau</div>
                                <div class="option" onclick="selectOption(94)">Guyana</div>
                                <div class="option" onclick="selectOption(95)">Haiti</div>
                                <div class="option" onclick="selectOption(96)">Holy See (Vatican City State)</div>
                                <div class="option" onclick="selectOption(97)">Honduras</div>
                                <div class="option" onclick="selectOption(98)">Hong Kong SAR of China</div>
                                <div class="option" onclick="selectOption(99)">Hungary</div>
                                <div class="option" onclick="selectOption(100)">Iceland</div>
                                <div class="option" onclick="selectOption(101)">India</div>
                                <div class="option" onclick="selectOption(102)">Indonesia</div>
                                <div class="option" onclick="selectOption(103)">Iran, Islamic Republic of</div>
                                <div class="option" onclick="selectOption(104)">Iraq</div>
                                <div class="option" onclick="selectOption(105)">Ireland</div>
                                <div class="option" onclick="selectOption(106)">Isle of Man</div>
                                <div class="option" onclick="selectOption(107)">Israel</div>
                                <div class="option" onclick="selectOption(108)">Italy</div>
                                <div class="option" onclick="selectOption(109)">Jamaica</div>
                                <div class="option" onclick="selectOption(110)">Japan</div>
                                <div class="option" onclick="selectOption(111)">Jersey</div>
                                <div class="option" onclick="selectOption(112)">Jordan</div>
                                <div class="option" onclick="selectOption(113)">Kazakhstan</div>
                                <div class="option" onclick="selectOption(114)">Kenya</div>
                                <div class="option" onclick="selectOption(115)">Kiribati</div>
                                <div class="option" onclick="selectOption(116)">Korea, Democratic People's Republic</div>
                                <div class="option" onclick="selectOption(117)">Korea, Republic</div>
                                <div class="option" onclick="selectOption(118)">Kosovo</div>
                                <div class="option" onclick="selectOption(119)">Kuwait</div>
                                <div class="option" onclick="selectOption(120)">Kyrgyzstan</div>
                                <div class="option" onclick="selectOption(121)">Lao People's Democratic Republic</div>
                                <div class="option" onclick="selectOption(122)">Latvia</div>
                                <div class="option" onclick="selectOption(123)">Lebanon</div>
                                <div class="option" onclick="selectOption(124)">Lesotho</div>
                                <div class="option" onclick="selectOption(125)">Liberia</div>
                                <div class="option" onclick="selectOption(126)">Libya</div>
                                <div class="option" onclick="selectOption(127)">Liechtenstein</div>
                                <div class="option" onclick="selectOption(128)">Lithuania</div>
                                <div class="option" onclick="selectOption(129)">Luxembourg</div>
                                <div class="option" onclick="selectOption(130)">Macau SAR of China</div>
                                <div class="option" onclick="selectOption(131)">Madagascar</div>
                                <div class="option" onclick="selectOption(132)">Malawi</div>
                                <div class="option" onclick="selectOption(133)">Malaysia</div>
                                <div class="option" onclick="selectOption(134)">Maldives</div>
                                <div class="option" onclick="selectOption(135)">Mali</div>
                                <div class="option" onclick="selectOption(136)">Malta</div>
                                <div class="option" onclick="selectOption(137)">Marshall Islands</div>
                                <div class="option" onclick="selectOption(138)">Martinique</div>
                                <div class="option" onclick="selectOption(139)">Mauritania</div>
                                <div class="option" onclick="selectOption(140)">Mauritius</div>
                                <div class="option" onclick="selectOption(141)">Mayotte</div>
                                <div class="option" onclick="selectOption(142)">Mexico</div>
                                <div class="option" onclick="selectOption(143)">Micronesia, Federated States of</div>
                                <div class="option" onclick="selectOption(144)">Moldova, Republic of</div>
                                <div class="option" onclick="selectOption(145)">Monaco</div>
                                <div class="option" onclick="selectOption(146)">Mongolia</div>
                                <div class="option" onclick="selectOption(147)">Montenegro</div>
                                <div class="option" onclick="selectOption(148)">Montserrat</div>
                                <div class="option" onclick="selectOption(149)">Morocco</div>
                                <div class="option" onclick="selectOption(150)">Mozambique</div>
                                <div class="option" onclick="selectOption(151)">Myanmar</div>
                                <div class="option" onclick="selectOption(152)">Namibia</div>
                                <div class="option" onclick="selectOption(153)">Nauru</div>
                                <div class="option" onclick="selectOption(154)">Nepal</div>
                                <div class="option" onclick="selectOption(155)">Netherlands</div>
                                <div class="option" onclick="selectOption(156)">New Caledonia</div>
                                <div class="option" onclick="selectOption(157)">New Zealand</div>
                                <div class="option" onclick="selectOption(158)">Nicaragua</div>
                                <div class="option" onclick="selectOption(159)">Niger</div>
                                <div class="option" onclick="selectOption(160)">Nigeria</div>
                                <div class="option" onclick="selectOption(161)">Niue</div>
                                <div class="option" onclick="selectOption(162)">Norfolk Island</div>
                                <div class="option" onclick="selectOption(163)">North Macedonia</div>
                                <div class="option" onclick="selectOption(164)">Northern Mariana Islands</div>
                                <div class="option" onclick="selectOption(165)">Norway</div>
                                <div class="option" onclick="selectOption(166)">Oman</div>
                                <div class="option" onclick="selectOption(167)">Pakistan</div>
                                <div class="option" onclick="selectOption(168)">Palau</div>
                                <div class="option" onclick="selectOption(169)">Palestinian Territory</div>
                                <div class="option" onclick="selectOption(170)">Panama</div>
                                <div class="option" onclick="selectOption(171)">Papua New Guinea</div>
                                <div class="option" onclick="selectOption(172)">Paraguay</div>
                                <div class="option" onclick="selectOption(173)">Peru</div>
                                <div class="option" onclick="selectOption(174)">Philippines</div>
                                <div class="option" onclick="selectOption(175)">Pitcairn</div>
                                <div class="option" onclick="selectOption(176)">Poland</div>
                                <div class="option" onclick="selectOption(177)">Portugal</div>
                                <div class="option" onclick="selectOption(178)">Puerto Rico</div>
                                <div class="option" onclick="selectOption(179)">Qatar</div>
                                <div class="option" onclick="selectOption(180)">Reunion</div>
                                <div class="option" onclick="selectOption(181)">Romania</div>
                                <div class="option" onclick="selectOption(182)">Russian Federation</div>
                                <div class="option" onclick="selectOption(183)">Rwanda</div>
                                <div class="option" onclick="selectOption(184)">Saint Bartelemey</div>
                                <div class="option" onclick="selectOption(185)">Saint Helena</div>
                                <div class="option" onclick="selectOption(186)">Saint Kitts and Nevis</div>
                                <div class="option" onclick="selectOption(187)">Saint Lucia</div>
                                <div class="option" onclick="selectOption(188)">Saint Martin</div>
                                <div class="option" onclick="selectOption(189)">Saint Pierre and Miquelon</div>
                                <div class="option" onclick="selectOption(190)">Saint Vincent and the Grenadines</div>
                                <div class="option" onclick="selectOption(191)">Samoa</div>
                                <div class="option" onclick="selectOption(192)">San Marino</div>
                                <div class="option" onclick="selectOption(193)">Sao Tome and Principe</div>
                                <div class="option" onclick="selectOption(194)">Saudi Arabia</div>
                                <div class="option" onclick="selectOption(195)">Senegal</div>
                                <div class="option" onclick="selectOption(196)">Serbia</div>
                                <div class="option" onclick="selectOption(197)">Seychelles</div>
                                <div class="option" onclick="selectOption(198)">Sierra Leone</div>
                                <div class="option" onclick="selectOption(199)">Singapore</div>
                                <div class="option" onclick="selectOption(200)">Sint Maarten</div>
                                <div class="option" onclick="selectOption(201)">Slovakia</div>
                                <div class="option" onclick="selectOption(202)">Slovenia</div>
                                <div class="option" onclick="selectOption(203)">Solomon Islands</div>
                                <div class="option" onclick="selectOption(204)">Somalia</div>
                                <div class="option" onclick="selectOption(205)">South Africa</div>
                                <div class="option" onclick="selectOption(206)">South Georgia and the South Sandwich Islands</div>
                                <div class="option" onclick="selectOption(207)">South Sudan</div>
                                <div class="option" onclick="selectOption(208)">Spain</div>
                                <div class="option" onclick="selectOption(209)">Sri Lanka</div>
                                <div class="option" onclick="selectOption(210)">Sudan</div>
                                <div class="option" onclick="selectOption(211)">Suriname</div>
                                <div class="option" onclick="selectOption(212)">Svalbard and Jan Mayen</div>
                                <div class="option" onclick="selectOption(213)">Swaziland</div>
                                <div class="option" onclick="selectOption(214)">Sweden</div>
                                <div class="option" onclick="selectOption(215)">Switzerland</div>
                                <div class="option" onclick="selectOption(216)">Syrian Arab Republic</div>
                                <div class="option" onclick="selectOption(217)">Taiwan Region</div>
                                <div class="option" onclick="selectOption(218)">Tajikistan</div>
                                <div class="option" onclick="selectOption(219)">Tanzania, United Republic of</div>
                                <div class="option" onclick="selectOption(220)">Thailand</div>
                                <div class="option" onclick="selectOption(221)">Timor-Leste</div>
                                <div class="option" onclick="selectOption(222)">Togo</div>
                                <div class="option" onclick="selectOption(223)">Tokelau</div>
                                <div class="option" onclick="selectOption(224)">Tonga</div>
                                <div class="option" onclick="selectOption(225)">Trinidad and Tobago</div>
                                <div class="option" onclick="selectOption(226)">Tunisia</div>
                                <div class="option" onclick="selectOption(227)">Turkey</div>
                                <div class="option" onclick="selectOption(228)">Turkmenistan</div>
                                <div class="option" onclick="selectOption(229)">Turks and Caicos Islands</div>
                                <div class="option" onclick="selectOption(230)">Tuvalu</div>
                                <div class="option" onclick="selectOption(231)">Uganda</div>
                                <div class="option" onclick="selectOption(232)">Ukraine</div>
                                <div class="option" onclick="selectOption(233)">United Arab Emirates</div>
                                <div class="option" onclick="selectOption(234)">United Kingdom</div>
                                <div class="option" onclick="selectOption(235)">United States Minor Outlying Islands</div>
                                <div class="option" onclick="selectOption(236)">Uruguay</div>
                                <div class="option" onclick="selectOption(237)">Uzbekistan</div>
                                <div class="option" onclick="selectOption(238)">Vanuatu</div>
                                <div class="option" onclick="selectOption(239)">Venezuela</div>
                                <div class="option" onclick="selectOption(240)">Vietnam</div>
                                <div class="option" onclick="selectOption(241)">Virgin Islands, British</div>
                                <div class="option" onclick="selectOption(242)">Virgin Islands, U.S.</div>
                                <div class="option" onclick="selectOption(243)">Wallis and Futuna</div>
                                <div class="option" onclick="selectOption(244)">Western Sahara</div>
                                <div class="option" onclick="selectOption(245)">Yemen</div>
                                <div class="option" onclick="selectOption(246)">Zambia</div>
                                <div class="option" onclick="selectOption(247)">Zimbabwe</div>
                                </div>
                    </div>
                    <div>
                        <label for="introduction">Giới thiệu</label>
                        <textarea name="introduction" class="introduction" id="introduction"> <?php echo $data['UserData']['Introduction']; ?></textarea>
                    </div>
                    <button class="save-change-button" id="save-change-profile" type="submit">Lưu thay đổi</button>
            </div>
        </form>
        <form action="#" id="edit-account-form">
                <div class="edit-account" id="edit-account">
                    <h3>Quản lí tài khoản</h3>
                    <div class="change-username">Thay đổi tài khoản <i class="fa-solid fa-angle-down"></i></div>
                    <div class="change-username-section">
                        <!-- <label for="username">Tài khoản<span class="essential">*</span></label>
                        <span class="alert username-alert"></span>
                        <input id="edit-account-username" type="text" name="username" id="username" value="<?php echo $data['UserData']['Username']; ?>" required> -->
                    </div>
                    <div class="change-password">Thay đổi mật khẩu <i class="fa-solid fa-angle-down"></i></div>
                    <div style="display: flex;" class="change-password-section">
                        <!-- <div>
                            <label for="password">Mật khẩu mới<span class="essential">*</span></label>
                            <span class="alert password-alert"></span>
                            <input id="edit-account-password" type="password" name="password" id="password" value="<?php echo $data['UserData']['Password']; ?>" required>
                        </div>
                        <div style="margin-left: 20px;">
                            <label for="confirmpassword">Xác nhận mật khẩu mới<span class="essential">*</span></label>
                            <span class="alert confirmpassword-alert"></span>
                            <input id="edit-account-confirmpassword" type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $data['UserData']['Password']; ?>" required>
                        </div> -->
                    </div>
                    <button class="save-change-button" id="save-change-account" type="submit">Lưu thay đổi</button>
                </div> 
        </form>
            </div>
        </div>



    <!-- <input type="text" name="location", class="location" id="location" value="<?php echo $data['UserData']['Location']; ?>"> -->

