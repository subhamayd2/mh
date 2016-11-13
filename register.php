<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register yourself | Mentorz Hub</title>
    <meta name="viewport" content="initial-width=device-width, initial-scale=1.0">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:700,400' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Cookie' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Raleway|Open+Sans|Anton|Open+Sans+Condensed:300" rel="stylesheet">

    <link rel="stylesheet" href="css/scroll.css">
    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="css/global.css">
</head>
<body>
<p class="header page-title"><strong>Mentorz</strong>Hub</p>
<p class="sub-header">Sign up now</p>

<div class="page-container">
    <div class="row spacing-top-lg">
        <div class="col s12 social center">
            <p>Sign up with:</p>
            <a class="btn blue darken-2 hoverable"><img src="img/linkedin.png" width="30"> <span>LinkedIn</span></a>
        </div>
        <div class="col s12 spacing-top center">
            <p><strong>OR</strong></p>
        </div>
        <div class="col s12 spacing-top">
            <ul class="tabs">
                <li class="tab col s6"><a href="#test1" class="active">Mentee</a></li>
                <li class="tab col s6"><a href="#test4">Mentor</a></li>
            </ul>
        </div>
    </div>
</div>

<div class="page-container">
    <div class="row" id="test1">
        <form class="col s12" id="mentee-form">
            <div class="row">
                <div class="col s12">
                    <h4 class="form-heading">Sign up as Mentee</h4>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Personal Information</h5>
                    <p>To get started, some basic information about yourself</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="first_name" name="first_name" type="text" class="validate">
                    <label for="first_name">First Name *</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="last_name" name="last_name" type="text" class="validate">
                    <label for="last_name">Last Name *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email" name="email" type="email" class="validate">
                    <label for="email">Email *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="gender">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Gender</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="dob">Date of birth *</label>
                    <input id="dob" name="dob" type="date" class="datepicker">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="phone" name="phone" type="text" maxlength="10" class="validate">
                    <label for="phone">Mobile *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select multiple name="language" >
                        <option value="" disabled selected>Select all languages you speak.</option>
                        <option value='English'>English</option>
                        <option value='Hindi'>Hindi</option>
                        <option value='Bengali'>Bengali</option>
                        <option value='Telugu'>Telugu</option>
                        <option value='Marathi'>Marathi</option>
                        <option value='Tamil'>Tamil</option>
                        <option value='Kannada'>Kannada</option>
                        <option value='Oriya'>Oriya</option>
                        <option value='Malayalam'>Malayalam</option>
                        <option value='Punjabi'>Punjabi</option>
                        <option value='Assamese'>Assamese</option>
                        <option value='Maithili'>Maithili</option>
                        <option value='Santhali'>Santhali</option>
                        <option value='Kashmiri'>Kashmiri</option>
                        <option value='Nepali'>Nepali</option>
                        <option value='Konkani'>Konkani</option>
                        <option value='Sindhi'>Sindhi</option>
                        <option value='Dogri'>Dogri</option>
                        <option value='Manipuri'>Manipuri</option>
                        <option value='Bodo'>Bodo</option>
                        <option value='Sanskrit'>Sanskrit</option>
                        <option value='Other'>Other</option>
                    </select>
                    <label>Languages *</label>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Residential Information</h5>
                    <p>Fill the address where you are currently living in (hostel/PG/home)</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="addr" name="addr" class="materialize-textarea"></textarea>
                    <label for="addr">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="area" name="area" type="text" class="validate">
                    <label for="area">Area name *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="city">
                        <option value="" disabled selected>Choose your city</option>
                        <?php include 'inc/cities.inc' ?>
                    </select>
                    <label>City *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="pincode" name="pincode" type="number" class="validate">
                    <label for="pincode">Pincode *</label>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Other Information</h5>
                    <p>Let us know your highest qualification & interest</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="quali">
                        <option value="" disabled selected>Choose your qualification</option>
                        <option value="9">9th</option>
                        <option value="10">10th</option>
                        <option value="11">11th</option>
                        <option value="12">12th</option>
                        <option value="UG">Graduation</option>
                        <option value="PG">Post Graduation</option>
                    </select>
                    <label>Highest Qualification *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="interest">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Career selection">Career selection</option>
                        <option value="Test preparation">Test preparation</option>
                        <option value="College selection">College selection</option>
                        <option value="Dream job">Dream job</option>
                    </select>
                    <label>Interested In *</label>
                </div>
            </div>
            <div class="row center">
                <div class="col s12">
                    <a id="submit-mentee" class="btn custom-input waves-effect waves-blue">Sign up as Mentee</a>
                </div>
            </div>
        </form>
    </div>

    <!--=======================================================================================================================================-->

    <div class="row" id="test4">
        <form class="col s12">
            <div class="row">
                <div class="col s12">
                    <h4 class="form-heading">Sign up as Mentor</h4>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Personal Information</h5>
                    <p>To get started, some basic information about yourself</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="first_name2" name="first_name" type="text" class="validate">
                    <label for="first_name2">First Name *</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="last_name2" name="last_name" type="text" class="validate">
                    <label for="last_name2">Last Name *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="email2" name="email" type="email" class="validate">
                    <label for="email2">Email *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password2" name="password" type="password" class="validate">
                    <label for="password2">Password *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="gender2" name="gender">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <label>Gender</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <label for="dob2">Date of birth *</label>
                    <input id="dob2" name="dob" type="date" class="datepicker">
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="phone2" name="phone" type="text" maxlength="10" class="validate">
                    <label for="phone2">Mobile *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select multiple id="lang2" name="language">
                        <option value="" disabled selected>Select all languages you speak.</option>
                        <option value='English'>English</option>
                        <option value='Hindi'>Hindi</option>
                        <option value='Bengali'>Bengali</option>
                        <option value='Telugu'>Telugu</option>
                        <option value='Marathi'>Marathi</option>
                        <option value='Tamil'>Tamil</option>
                        <option value='Kannada'>Kannada</option>
                        <option value='Oriya'>Oriya</option>
                        <option value='Malayalam'>Malayalam</option>
                        <option value='Punjabi'>Punjabi</option>
                        <option value='Assamese'>Assamese</option>
                        <option value='Maithili'>Maithili</option>
                        <option value='Santhali'>Santhali</option>
                        <option value='Kashmiri'>Kashmiri</option>
                        <option value='Nepali'>Nepali</option>
                        <option value='Konkani'>Konkani</option>
                        <option value='Sindhi'>Sindhi</option>
                        <option value='Dogri'>Dogri</option>
                        <option value='Manipuri'>Manipuri</option>
                        <option value='Bodo'>Bodo</option>
                        <option value='Sanskrit'>Sanskrit</option>
                        <option value='Other'>Other</option>
                    </select>
                    <label>Languages *</label>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Residential Information</h5>
                    <p>Fill the address where you are currently living in (hostel/PG/home)</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <textarea id="addr2" name="addr" class="materialize-textarea"></textarea>
                    <label for="addr2">Address</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="area2" name="area" type="text" class="validate">
                    <label for="area2">Area name *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="city2" name="city">
                        <option value="" disabled selected>Choose your city</option>
                        <?php include 'inc/cities.inc' ?>
                    </select>
                    <label>City *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="pincode2" name="pincode" type="number" class="validate">
                    <label for="pincode2">Pincode *</label>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Professional Information</h5>
                    <p>Now to learn a little more about your professional background</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="curr_job" name="curr_job" type="text" class="validate">
                    <label for="curr_job">Current occupation title *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="curr_job_org" name="curr_job_org" type="text" class="validate">
                    <label for="curr_job_org">Current occupation organization *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="curr_job_industry" name="curr_job_industry">
                        <option value="" disabled selected>Choose industry</option>
                        <?php include 'inc/industry.inc' ?>
                    </select>
                    <label>Current occupation industry *</label>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                    <a class="btn blue lighten-1 waves-effect"><i class="material-icons left">add</i> Previous occupation</a>
                </div>
            </div>
            <div class="row spacing-top">
                <div class="col s12 form-title">
                    <h5>Educational Information</h5>
                    <p>Now to learn a little more about your educational background</p>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="higher_edu_title" name="higher_edu_title">
                        <option value="" disabled selected>Choose your option</option>
                        <option value='Phd'>Phd</option> <option value='DPhil'>DPhil</option> <option value='MD'>MD</option> <option value='MSc'>MSc</option> <option value='MA'>MA</option> <option value='LLM'>LLM</option> <option value='MCA'>MCA</option> <option value='MPhil'>MPhil</option> <option value='PG Dip'>PG Dip</option> <option value='Other'>Other</option>
                    </select>
                    <label>Higher education title *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="higher_edu_subj" name="higher_edu_subj">
                        <option value="" disabled selected>Choose your subject</option>
                        <?php include 'inc/higher_subj.inc' ?>
                    </select>
                    <label>Higher education subject *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="higher_edu_inst" name="higher_edu_inst" type="text" class="validate">
                    <label for="higher_edu_inst">Higher education institute *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select id="under_edu_title" name="under_edu_title">
                        <option value="" disabled selected>Choose your option</option>
                        <option value='BA'>BA</option> <option value='B.Com'>B.Com</option> <option value='B.SC'>B.SC</option> <option value='BE'>BE</option> <option value='MBBS'>MBBS</option> <option value='BCA'>BCA</option> <option value='B.Tech'>B.Tech</option> <option value='Diploma'>Diploma</option> <option value='B.Arch'>B.Arch</option> <option value='BBM'>BBM</option> <option value='B.Pharm'>B.Pharm</option> <option value='Other'>Other</option>
                    </select>
                    <label>Under education title *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select id="under_edu_subj" name="under_edu_subj">
                        <option value="" disabled selected>Choose your subject</option>
                        <?php include 'inc/under_subj.inc' ?>
                    </select>
                    <label>Under education subject *</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="under_edu_inst" name="under_edu_inst" type="text" class="validate">
                    <label for="under_edu_inst">Under education institute *</label>
                </div>
            </div>

            <div class="row">
                <div class="input-field col s12">
                    <select id="secondary_edu" name="secondary_edu">
                        <option value="" disabled selected>Choose your subject</option>
                        <option value='Arts'>Arts</option> <option value='Science'>Science</option> <option value='Commerce'>Commerce</option> <option value='Other'>Other</option>
                    </select>
                    <label>Secondary education field *</label>
                </div>
            </div>



            <div class="row center">
                <div class="col s12">
                    <a class="btn custom-input waves-effect waves-blue" id="submit-mentor">Sign up as Mentor</a>
                </div>
            </div>
        </form>
    </div>
</div>

<?php include "inc/footer.html"; ?>
<script src="js/register.js"></script>
</body>
</html>