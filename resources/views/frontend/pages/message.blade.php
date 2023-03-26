<!doctype html>
<html lang="en">

<head>
    {{-- css  --}}
    @include('frontend.includes.css')
    <style>
        .user-profile-area{
  width: 100%;
  height: 510px;
  background-color: #F9F9F9;
  margin: 0;
  padding: 0;
  overflow: auto;
}
.user-profile-area a{
  width: 100%;
  margin: 0px;
  padding: 0px;
}
.userprofileImage {
  height: 60px;
  width: 60px;
  margin: 0 0 3% 3%;
  padding: 5px;
}

.userprofileImage img{
  height: 100%;
  width: 100%;
  display: inline-block;
  margin: 0;
  padding: 0;
  border: 3px solid #FBBE32;
  border-radius: 50%;
  overflow: hidden;
  z-index: -1;
}


.userprofileImage img.active{
  border: 3px solid green;
}
.userprofile_content{
  margin: 0;
  padding: 0;
  display: block;
  border-bottom: 1px solid #DCDEE0;
  width: 100%;
  height: 100%;
  position: relative;
}
.user_profile_name{
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: rgba(249,249,249,0.01);
  left: -150%;
  top: 0;
  z-index: 1;
  transition: all 0.5s;
}
.user_profile_name h6{
  color: #24ACF2;
  text-transform: capitalize;
  text-align: left;
  padding: 10%;
  margin-left: 12%;
  font-weight: 500;
  font-size: 18px;
}

.userprofile_content:hover .user_profile_name{
  left: 0;
  display: block;
}

/* message area right side  */
.username-show h6{
  margin: 0;
  padding: 0;
}
.username-show span{
  color: #02a349;
}
.message-scoller{
  height: 370px;
  overflow: auto !important;
  margin: 0;
  padding: 0;

}
.messagearea {
  width: 100%;
  display: flex;
  flex-direction: row;
  margin-top: 3%;
}

.user_1{
 width: 50%;
 float: left;
 
}
.user_2{
  width: 50%;
  margin-top: 8%;
  
}
.user_1_message {
  padding: 5px;
  color: #fff;
  display: block;
}
.user_2_message {
  padding: 5px;
  color: #000;
  display: block;
  overflow: hidden;
}
.user_1_message p{
  background-color: #00acee;
  font-size: 15px;
  padding: 12px;
  border-radius: 15px;
}

.user_2_message p{
  background-color: #E9EBEC;
  font-size: 15px;
  padding: 12px;
  border-radius: 15px;
}
input.message{
    padding: 10px;
    background-color: #E9EBEC;
    outline: none !important;
    height: 50px;
    border-radius: 26px;
}
.sendbtn{
  background-color: #051D43;
  color: #fff;
  border-radius: 0px 25px 25px 0px;
  height: 50px;
  font-size: 15px;
  margin: 0;
  
}

@media only screen and (max-width: 766px) {
    .user-profile-area{
      height: 335px;
    }
    .user_profile_name h6{
      padding: 3%;
    }

    .user_1_message p,.user_2_message p{
      padding: 10px;
    }
}
@media only screen and (max-width: 300px) {
    .user-profile-area{
      height: 210px;
    }
    .user_profile_name h6{
      padding: 10%;
      font-size: 14px;
      margin-left: 15%;
    }
    .user_1_message p,.user_2_message p{
      padding: 8px;
    }
}
    </style>
</head>

<body>
    <div class="body_wrap">
        <!-- backtotop - start -->
        <div class="backtotop">
            <a href="#" class="scroll">
                <i class="far fa-arrow-up"></i>
            </a>
        </div>

        <!-- preloader - start -->
        <div id="preloader"></div>

        {{-- header  --}}
        @include('frontend.includes.header')
        <main>
            {{-- sidebar cart  --}}
            @include('frontend.includes.sidebar_cart')
             <!-- breadcrumb_section - start
                ================================================== -->
            <div class="breadcrumb_section">
                <div class="container">
                    <ul class="breadcrumb_nav ul_li">
                        <li><a href="index.html">Home</a></li>
                        <li>Message</li>
                    </ul>
                    <div class="username-show text-center">
                        <h6 class="mb-1 p-1">Shomick Hasan</h6>
                        <span>active now</span>
                    </div>
                </div>
            </div>
    <!-- breadcrumb_section - end
                ================================================== -->

            <!-- message section - start
                        ================================================== -->
            <section class="message_section">
                <div class="container-fluid">
                    <div class="row">
                        {{-- left side user profile area  --}}
                        <div class="col-md-3 sm-3 userpro">
                            <div class="user-profile-area">
                                {{-- user profile left side when user active --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="active" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user active --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                                {{-- user profile left side when user inactive --}}
                                <a href="#">
                                    <div class="userprofile_content">
                                        <div class="userprofileImage ">
                                            <img class="" src="{{ asset('frontend') }}/images/users/user.png" alt="user">
                                        </div>
                                        <div class="user_profile_name">
                                            <h6>user name</h6>
                                        </div>
                                    </div>  
                                    
                                </a> {{-- end user profile left side when user inactive --}}
                            </div>
                        </div>
                        {{-- right side message--}}
                        <div class="col-md-9">
                            <div class="message-scoller">
                                {{-- user message conversation  --}}
                                <div class="messagearea">
                                    <div class="user_1">
                                        <div class="user_1_message">
                                            <p>hi</p><br>
                                        </div>
                                    </div>
                                    <div class="user_2">
                                        <div class="user_2_message">
                                            <p>hellow</p>
                                            <p>how are you?</p>
                                        </div>
                                    </div>
                                </div>  {{-- end user message conversation  --}}
                                {{-- user message conversation  --}}
                                <div class="messagearea">
                                    <div class="user_1">
                                        <div class="user_1_message">
                                            <p>i am fine</p>
                                            <p>what are you doing</p>
                                        </div>
                                    </div>
                                    <div class="user_2">
                                        <div class="user_2_message">
                                            <p>nothing special</p>
                                        </div>
                                    </div>
                                </div>  {{-- end user message conversation  --}}
                            </div>
                            {{-- send message area  --}}
                            <hr>
                            <div class="send-message m-2">
                                <div class="row">
                                    <div class="col-md-8 offset-1">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control message" placeholder="Enter message">
                                            <div class="input-group-append">
                                              <button class="btn sendbtn" type="button">Send</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                </div>
            </section>
    <!-- message_section - end
                ================================================== -->
        </main>
    </div>
    {{-- scripts  --}}
    @include('frontend.includes.scripts')
</body>

</html>

