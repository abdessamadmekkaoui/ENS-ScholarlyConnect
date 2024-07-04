                        <!--profile form-->
                                    <div class="modal fade " id="profilModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg ">
                                                <div class="modal-content ">
                                                    <div class="modal-header">
                                                        <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">your profile</h3>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="update-profile">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                        
                                                        <div class="flex">
                                                            <div class="inputBox">
                                                                <span>Id :</span>
                                                                <input type="number" value="<?php echo $admin['id']; ?>" class="box" readonly>
                                                                <span>Username :</span>
                                                                <input type="text" name="update_name" value="<?php echo $admin['name']; ?>" class="box" readonly>
                                                                <span>Your email :</span>
                                                                <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box" readonly>
                                                                
                                                            </div>
                                                            <div class="inputBox">
                                                                <span>password :</span>
                                                                <input type="text"  value="<?php echo $admin['password']; ?>" class="box" readonly>
                                                                <span>your image :</span>
                                                                <?php
                                                                    if($admin['image'] == ''){
                                                                    echo '<img src="images/default-avatar.png">';
                                                                    }else{
                                                                    echo '<img src="../uploaded_img/'.$admin['image'].'">';
                                                                    }
                                                                    if(isset($message)){
                                                                    foreach($message as $message){
                                                                        echo '<div class="message">'.$message.'</div>';
                                                                    }
                                                                    }
                                                                ?>
                                                            </div>
                                                        </div>
                                                        <a class=" btn btn-primary" data-bs-toggle="modal" data-bs-target="#upprofilModal">Update Profile</a>
                                                        </form>
                                                        </div>
                                                    </div>
                                                    </div>
                                            </div>
                                                <style>
                                                        .update-profile{
                                                        background-color: #bcc;
                                                        display: flex;
                                                        }

                                                        .update-profile form{
                                                        margin:10%;
                                                        padding:2%;
                                                        background-color: #fff;
                                                        box-shadow: 0 5px 10px rgba(0,0,0,.1);
                                                        width: 700px;
                                                        text-align: center;
                                                        border-radius: 5px;
                                                        }

                                                        .update-profile form img{
                                                        height: 50%;
                                                        width: 50%;
                                                        border-radius: 10%;
                                                        object-fit: cover;
                                                        margin-top:10px;
                                                        margin-bottom: 5px;
                                                        margin-left: -30px;
                                                        }

                                                        .update-profile form .flex{
                                                        display: flex;
                                                        justify-content: space-between;
                                                        margin-bottom: 20px;
                                                        gap:15px;
                                                        }

                                                        .update-profile form .flex .inputBox{
                                                        width: 49%;
                                                        }

                                                        .update-profile form .flex .inputBox span{
                                                        text-align: left;
                                                        display: block;
                                                        margin-top: 15px;
                                                        font-size: 17px;
                                                        color:#333;
                                                        }

                                                        .update-profile form .flex .inputBox .box{
                                                        width: 100%;
                                                        border-radius: 5px;
                                                        background-color: #bcc;
                                                        padding:12px 14px;
                                                        font-size: 17px;
                                                        color:#333;
                                                        margin-top: 10px;
                                                        }

                                                        @media (max-width:650px){
                                                        .update-profile form .flex{
                                                            flex-wrap: wrap;
                                                            gap:0;
                                                        }
                                                        .update-profile form .flex .inputBox{
                                                            width: 100%;
                                                        }
                                                        }
                                                </style>
                        <!--fin profile form-->
                        <!--UPDATE profile form-->
                                    <div class="modal fade " id="upprofilModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg ">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h3 style=" font-size: 30px; color: green; text-transform: uppercase;">Update profile</h3>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="update-profile">

                                                  

                                                    <form action="" method="post" enctype="multipart/form-data">
                                                    <div class=" image-container p-5">
                                                    <?php
                                                        if($admin['image'] == ''){
                                                            echo '<img src="images/default-avatar.png">';
                                                        }else{
                                                            echo '<img src="../uploaded_img/'.$admin['image'].'">';
                                                        }
                                                        if(isset($message)){
                                                            foreach($message as $message){
                                                                echo '<div class="message">'.$message.'</div>';
                                                            }
                                                        }
                                                    ?>
                                                    <style>
                                                        .image-container {
                                                        position: relative;
                                                        }

                                                        .icon-overlay {
                                                        position: absolute;
                                                        top: -120px;
                                                        left: 90px;
                                                        width: 100%;
                                                        height: 100%;
                                                        display: flex;
                                                        justify-content: center;
                                                        align-items: center;
                                                        opacity: 0;
                                                        transition: opacity 0.2s ease-in-out;
                                                        }

                                                        .image-container:hover .icon-overlay {
                                                        opacity: 1;
                                                        }

                                                        .fa-file {
                                                        color: #fff;
                                                        font-size: 24px;
                                                        }

                                                    </style>
                                                    <div class="icon-overlay">
                                                    <label for="finput">
                                                        <i class="fa-solid fa-pen-to-square fa-2xl" style="width:350%; color: #05d5ff;"></i>
                                                    </label>
                                                    </div> 
                                                    <input id="finput" style="display:none;" type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                                                </div>
                                                    <div class="flex">
                                                        <div class="inputBox">
                                                            <span>name :</span>
                                                            <input type="text" name="update_name" value="<?php echo $admin['name']; ?>" class="box">
                                                            <span>your email :</span>
                                                            <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box">
                                                            <span>conferm email :</span>
                                                            <input type="text" name="update_email" value="<?php echo $admin['email']; ?>" class="box">
                                                        </div>
                                                        <div class="inputBox">
                                                            <input type="hidden" name="old_pass" value="<?php echo $admin['password']; ?>">
                                                            <span>old password :</span>
                                                            <input type="password" name="update_pass" placeholder="enter previous password" class="box">
                                                            <span>new password :</span>
                                                            <input type="password" name="new_pass" placeholder="enter new password" class="box">
                                                            <span>confirm password :</span>
                                                            <input type="password" name="confirm_pass" placeholder="confirm new password" class="box">
                                                        </div>
                                                    </div>
                                                    <input type="submit" value="update profile" name="update_profile" class="btn btn-success">
                                                    </form>
                                                    </div>
                                                </div>
                                                </div>
                                    </div>  
                                        <?php
                                                $user_id = $_SESSION['id'];
                                                if(isset($_POST['update_profile'])){
                                                $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
                                                $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);
                                                mysqli_query($conn, "UPDATE `parents` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');
                                                $old_pass = $_POST['old_pass'];
                                                $update_pass = $_POST['update_pass'];
                                                $new_pass = $_POST['new_pass'];
                                                $confirm_pass = $_POST['confirm_pass'];

                                                if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
                                                    if($update_pass != $old_pass){
                                                        $message[] = 'old password not matched!';
                                                    }elseif($new_pass != $confirm_pass){
                                                        $message[] = 'confirm password not matched!';
                                                    }else{
                                                        mysqli_query($conn, "UPDATE `parents` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
                                                        $message[] = 'password updated successfully!';
                                                    }
                                                }

                                                $update_image = $_FILES['update_image']['name'];
                                                $update_image_size = $_FILES['update_image']['size'];
                                                $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
                                                $update_image_folder = '../uploaded_img/'.$update_image;

                                                if(!empty($update_image)){
                                                    if($update_image_size > 2000000){
                                                        $message[] = 'image is too large';
                                                    }else{
                                                        $image_update_query = mysqli_query($conn, "UPDATE `parents` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
                                                        if($image_update_query){
                                                            move_uploaded_file($update_image_tmp_name, $update_image_folder);
                                                        }
                                                        $message[] = 'image updated succssfully!';
                                                    }
                                                }

                                                }

                                        ?>
                        <!--fin UAPDATE profile form-->
                        <style>
                                table td{
                                vertical-align: middle !important;
                                    }
                                :root {
                                --primary-clr: #838add;
                                --main-text-color: #00a;
                                --second-text-color: #a00;
                                --second-bg-color: #aaa;
                                }
                                ::-webkit-scrollbar {
                                width: 1px;
                                height: 1px;
                                }
                                ::-webkit-scrollbar-track {
                                background: #f5f5f5;
                                border-radius: 50px;
                                }
                                ::-webkit-scrollbar-thumb {
                                background: var(--primary-clr);
                                border-radius: 50px;
                                }
                                .primary-text {
                                color: var(--main-text-color);
                                }

                                .second-text {
                                color: var(--second-text-color);
                                }

                                .secondary-bg {
                                background-color: var(--second-bg-color);
                                }

                                .rounded-full {
                                border-radius: 100%;
                                }

                                #wrapper {
                                overflow-x: hidden;
                                background-color: #bcc;

                                }

                                #sidebar-wrapper {
                                min-height: 100vh;
                                margin-left: -15rem;
                                -webkit-transition: margin 0.25s ease-out;
                                -moz-transition: margin 0.25s ease-out;
                                -o-transition: margin 0.25s ease-out;
                                transition: margin 0.25s ease-out;
                                }

                                #sidebar-wrapper .sidebar-heading {
                                padding: 0.875rem 1.25rem;
                                font-size: 1.2rem;
                                }

                                #sidebar-wrapper .list-group {
                                width: 15rem;
                                }

                                #page-content-wrapper {
                                min-width: 100vw;
                                }

                                #wrapper.toggled #sidebar-wrapper {
                                margin-left: 0;
                                }

                                #menu-toggle {
                                cursor: pointer;
                                }

                                .list-group-item {
                                border: none;
                                padding: 20px 30px;
                                }

                                .list-group-item.active {
                                background-color: transparent;
                                color: var(--main-text-color);
                                font-weight: bold;
                                border: none;
                                }
                                .input-group{
                                background-color: #bab;
                                }


                                @media (min-width: 1200px) {
                                #sidebar-wrapper {
                                margin-left: 0;
                                }

                                #page-content-wrapper {
                                min-width: 0;
                                width: 100%;
                                }

                                #wrapper.toggled #sidebar-wrapper {
                                margin-left: -15rem;
                                }
                                }

                                .container {
                                position: relative;
                                width: 100%;
                                min-height: 850px;
                                padding: 5px;
                                color: #fff;
                                display: flex;

                                border-radius: 10px;
                                background-color: #20B2AA;
                                }
                                .left {
                                width: 60%;
                                height: 100%;
                                padding: 20px;
                                }
                                .calendar {
                                position: relative;
                                width: 100%;
                                height: 100%;
                                display: flex;
                                flex-direction: column;
                                flex-wrap: wrap;
                                justify-content: space-between;
                                color: #878895;
                                border-radius: 5px;
                                background-color: #F0F8FF;
                                }
                                /* set after behind the main element */


                                .calendar .month {
                                width: 100%;
                                height: 150px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                padding: 0 50px;
                                font-size: 1.2rem;
                                font-weight: 500;
                                text-transform: capitalize;
                                }
                                .calendar .month .prev,
                                .calendar .month .next {
                                cursor: pointer;
                                }
                                .calendar .month .prev:hover,
                                .calendar .month .next:hover {
                                color: var(--primary-clr);
                                }
                                .calendar .weekdays {
                                width: 100%;
                                height: 100px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                padding: 0 20px;
                                font-size: 1rem;
                                font-weight: 500;
                                text-transform: capitalize;
                                }
                                .weekdays div {
                                width: 14.28%;
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                }
                                .calendar .days {
                                width: 100%;
                                display: flex;
                                flex-wrap: wrap;
                                justify-content: space-between;
                                padding: 0 20px;
                                font-size: 1rem;
                                font-weight: 500;
                                margin-bottom: 20px;
                                }
                                .calendar .days .day {
                                width: 14.28%;
                                height: 90px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                cursor: pointer;
                                color: var(--primary-clr);
                                border: 1px solid #f5f5f5;
                                }
                                .calendar .days .day:nth-child(7n + 1) {
                                border-left: 2px solid #f5f5f5;
                                }
                                .calendar .days .day:nth-child(7n) {
                                border-right: 2px solid #f5f5f5;
                                }
                                .calendar .days .day:nth-child(-n + 7) {
                                border-top: 2px solid #f5f5f5;
                                }
                                .calendar .days .day:nth-child(n + 29) {
                                border-bottom: 2px solid #f5f5f5;
                                }

                                .calendar .days .day:not(.prev-date, .next-date):hover {
                                color: #fff;
                                background-color: var(--primary-clr);
                                }
                                .calendar .days .prev-date,
                                .calendar .days .next-date {
                                color: #b3b3b3;
                                }
                                .calendar .days .active {
                                position: relative;
                                font-size: 2rem;
                                color: #fff;
                                background-color: var(--primary-clr);
                                }
                                .calendar .days .active::before {
                                content: "";
                                position: absolute;
                                top: 0;
                                left: 0;
                                width: 100%;
                                height: 100%;
                                box-shadow: 0 0 10px 2px var(--primary-clr);
                                }
                                .calendar .days .today {
                                font-size: 2rem;
                                }
                                .calendar .days .event {
                                position: relative;
                                }
                                .calendar .days .event::after {
                                content: "";
                                position: absolute;
                                bottom: 10%;
                                left: 50%;
                                width: 75%;
                                height: 6px;
                                border-radius: 30px;
                                transform: translateX(-50%);
                                background-color: var(--primary-clr);
                                }
                                .calendar .days .day:hover.event::after {
                                background-color: #fff;
                                }
                                .calendar .days .active.event::after {
                                background-color: #fff;
                                bottom: 20%;
                                }
                                .calendar .days .active.event {
                                padding-bottom: 10px;
                                }
                                .calendar .goto-today {
                                width: 100%;
                                height: 50px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                gap: 5px;
                                padding: 0 20px;
                                margin-bottom: 20px;
                                color: var(--primary-clr);
                                }
                                .calendar .goto-today .goto {
                                display: flex;
                                align-items: center;
                                border-radius: 5px;
                                overflow: hidden;
                                border: 1px solid var(--primary-clr);
                                }
                                .calendar .goto-today .goto input {
                                width: 100%;
                                height: 30px;
                                outline: none;
                                border: none;
                                border-radius: 5px;
                                padding: 0 20px;
                                color: var(--primary-clr);
                                border-radius: 5px;
                                }
                                .calendar .goto-today button {
                                padding: 5px 10px;
                                border: 1px solid var(--primary-clr);
                                border-radius: 5px;
                                background-color: transparent;
                                cursor: pointer;
                                color: var(--primary-clr);
                                }
                                .calendar .goto-today button:hover {
                                color: #fff;
                                background-color: var(--primary-clr);
                                }
                                .calendar .goto-today .goto button {
                                border: none;
                                border-left: 1px solid var(--primary-clr);
                                border-radius: 0;
                                }
                                .container .right {
                                position: relative;
                                width: 40%;
                                min-height: 100%;
                                padding: 20px 0;
                                }

                                .right .today-date {
                                width: 100%;
                                height: 50px;
                                display: flex;
                                flex-wrap: wrap;
                                gap: 10px;
                                align-items: center;
                                justify-content: space-between;
                                padding: 0 40px;
                                padding-left: 70px;
                                margin-top: 50px;
                                margin-bottom: 20px;
                                text-transform: capitalize;
                                }
                                .right .today-date .event-day {
                                font-size: 2rem;
                                font-weight: 500;
                                }
                                .right .today-date .event-date {
                                font-size: 1rem;
                                font-weight: 400;
                                color: #ffa;
                                }
                                .events {
                                width: 100%;
                                height: 100%;
                                max-height: 600px;
                                overflow-x: hidden;
                                overflow-y: auto;
                                display: flex;
                                flex-direction: column;
                                padding-left: 4px;
                                }
                                .events .event {
                                position: relative;
                                width: 95%;
                                min-height: 70px;
                                display: flex;
                                justify-content: center;
                                flex-direction: column;
                                gap: 5px;
                                padding: 0 20px;
                                padding-left: 50px;
                                color: #fff;
                                background: linear-gradient(90deg, #3f4458, transparent);
                                cursor: pointer;
                                }
                                /* even event */
                                .events .event:nth-child(even) {
                                background: transparent;
                                }
                                .events .event:hover {
                                background: linear-gradient(90deg, var(--primary-clr), transparent);
                                }
                                .events .event .title {
                                display: flex;
                                align-items: center;
                                pointer-events: none;
                                }
                                .events .event .title .event-title {
                                font-size: 1rem;
                                font-weight: 400;
                                margin-left: 20px;
                                }
                                .events .event i {
                                color: var(--primary-clr);
                                font-size: 0.5rem;
                                }
                                .events .event:hover i {
                                color: #fff;
                                }
                                .events .event .event-time {
                                font-size: 0.8rem;
                                font-weight: 400;
                                color: #878895;
                                margin-left: 15px;
                                pointer-events: none;
                                }
                                .events .event:hover .event-time {
                                color: #fff;
                                }
                                /* add tick in event after */
                                .events .event::after {
                                content: "✓";
                                position: absolute;
                                top: 50%;
                                right: 0;
                                font-size: 3rem;
                                line-height: 1;
                                display: none;
                                align-items: center;
                                justify-content: center;
                                opacity: 0.3;
                                color: var(--primary-clr);
                                transform: translateY(-50%);
                                }
                                .events .event:hover::after {
                                display: flex;
                                }
                                .add-event {
                                position: absolute;
                                bottom: 30px;
                                right: 30px;
                                width: 40px;
                                height: 40px;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 1rem;
                                color: #fff;
                                border: 2px solid #000;
                                opacity: 0.5;
                                border-radius: 50%;
                                background-color: transparent;
                                cursor: pointer;
                                }
                                .add-event:hover {
                                opacity: 1;
                                }
                                .add-event i {
                                pointer-events: none;
                                }
                                .events .no-event {
                                width: 100%;
                                height: 100%;
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                font-size: 1.5rem;
                                font-weight: 500;
                                color: #ff8;
                                }
                                .add-event-wrapper {
                                position: absolute;
                                bottom: 100px;
                                left: 50%;
                                width: 90%;
                                max-height: 0;
                                overflow: hidden;
                                border-radius: 5px;
                                background-color: #fff;
                                transform: translateX(-50%);
                                transition: max-height 0.5s ease;
                                }
                                .add-event-wrapper.active {
                                max-height: 300px;
                                }
                                .add-event-header {
                                width: 100%;
                                height: 50px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                padding: 0 20px;
                                color: #000;
                                border-bottom: 1px solid #f5f5f5;
                                }
                                .add-event-header .close {
                                font-size: 1.5rem;
                                cursor: pointer;
                                }
                                .add-event-header .close:hover {
                                color: var(--primary-clr);
                                }
                                .add-event-header .title {
                                font-size: 1.2rem;
                                font-weight: 500;
                                }
                                .add-event-body {
                                width: 100%;
                                height: 100%;
                                display: flex;
                                flex-direction: column;
                                gap: 5px;
                                padding: 20px;
                                }
                                .add-event-body .add-event-input {
                                width: 100%;
                                height: 40px;
                                display: flex;
                                align-items: center;
                                justify-content: space-between;
                                gap: 10px;
                                }
                                .add-event-body .add-event-input input {
                                width: 100%;
                                height: 100%;
                                outline: none;
                                border: none;
                                border-bottom: 1px solid #f5f5f5;
                                padding: 0 10px;
                                font-size: 1rem;
                                font-weight: 400;
                                color: #373c4f;
                                }
                                .add-event-body .add-event-input input::placeholder {
                                color: #a5a5a5;
                                }
                                .add-event-body .add-event-input input:focus {
                                border-bottom: 1px solid var(--primary-clr);
                                }
                                .add-event-body .add-event-input input:focus::placeholder {
                                color: var(--primary-clr);
                                }
                                .add-event-footer {
                                display: flex;
                                align-items: center;
                                justify-content: center;
                                padding: 20px;
                                }
                                .add-event-footer .add-event-btn {
                                height: 40px;
                                font-size: 1rem;
                                font-weight: 500;
                                outline: none;
                                border: none;
                                color: #fff;
                                background-color: var(--primary-clr);
                                border-radius: 5px;
                                cursor: pointer;
                                padding: 5px 10px;
                                border: 1px solid var(--primary-clr);
                                }
                                .add-event-footer .add-event-btn:hover {
                                background-color: transparent;
                                color: var(--primary-clr);
                                }

                                /* media queries */

                                @media screen and (max-width: 1000px) {
                                body {
                                align-items: flex-start;
                                justify-content: flex-start;
                                }
                                .container {
                                min-height: 100vh;
                                flex-direction: column;
                                border-radius: 0;
                                }
                                .container .left {
                                width: 100%;
                                height: 100%;
                                padding: 20px 0;
                                }
                                .container .right {
                                width: 100%;
                                height: 100%;
                                padding: 20px 0;
                                }
                                .calendar::before,
                                .calendar::after {
                                top: 100%;
                                left: 50%;
                                width: 97%;
                                height: 12px;
                                border-radius: 0 0 5px 5px;
                                transform: translateX(-50%);
                                }
                                .calendar::before {
                                width: 94%;
                                top: calc(100% + 12px);
                                }
                                .events {
                                padding-bottom: 340px;
                                }
                                .add-event-wrapper {
                                bottom: 100px;
                                }
                                }
                                @media screen and (max-width: 500px) {
                                .calendar .month {
                                height: 75px;
                                }
                                .calendar .weekdays {
                                height: 50px;
                                }
                                .calendar .days .day {
                                height: 40px;
                                font-size: 0.8rem;
                                }
                                .calendar .days .day.active,
                                .calendar .days .day.today {
                                font-size: 1rem;
                                }
                                .right .today-date {
                                padding: 20px;
                                }
                                }

                                .credits {
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                right: 0;
                                text-align: center;
                                padding: 10px;
                                font-size: 12px;
                                color: #fff;
                                background-color: #b38add;
                                }
                                .credits a {
                                color: #fff;
                                text-decoration: none;
                                font-weight: 600;
                                }
                                .credits a:hover {
                                text-decoration: underline;
                                }

                        </style>
<!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="../uploaded_img/a.jpg" style="width: 180px; border-radius: 100%; margin-top:-50px;margin-bottom:-10px;"><br> ENS - kech</div>
            <div class="list-group list-group-flush my-3">
                <a href="home.php" class="list-group-item list-group-item-action bg-transparent second-text active">
                <i class="fa-solid fa-house me-3"></i>Home</a>
                <a href="n&a.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fa-solid fa-square-poll-vertical me-3"></i>notes/absence</a>
                <a href="../real_chat/index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
                <i class="fas fa-comment-dots me-3"></i>Chat</a>
                <a href="../logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
                <i class="fas fa-power-off me-3"></i>Logout</a>
            </div>
    </div>
<!-- FIN Sidebar -->
<!-- NAVBAR -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
            <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
            <h2 class="fs-2 m-0">Home page</h2>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
            role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php 
            if($admin['image'] == ''){?>
                <i class="fas fa-user me-2"></i><?php
                }else{
                echo '<img src="../uploaded_img/'.$admin['image'].'" style="width: 40px; border-radius: 100%;" class="me-2">';
                }
            ?><?php echo $admin['name'];?>
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class=" dropdown-item card-tools" data-bs-toggle="modal" data-bs-target="#profilModal">Profile</a></li>
            <li><a class=" dropdown-item card-tools" data-bs-toggle="modal" data-bs-target="#upprofilModal">up Profile</a></li>
            <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
        </ul>
    </li>
    </ul>
        </div>
    </nav>
<!--FIN NAVBAR -->