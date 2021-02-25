<?php $child = 'assess'; $page = 'studentR'; include 'menu.php' ?>
<nav class="nav-wraper teal accent-5" style="position:sticky;top:0px;z-index:9;">
  <div class="container flow-text center ">
    <i class="fa bar fa-bars left" style="padding-top:15px;margin-left:-10px;cursor:pointer;"></i>
    <span class="flow-text">Student Assessment</span>
    <?php
        $time=mysqli_query($pcon,"SELECT * FROM teacher WHERE username='$user'");
        $timeState=mysqli_fetch_assoc($time);
        $diV=$timeState['showTime'];
        if($diV == 'checked'){
            echo '<div class="timeStamp right"></div>';
        }
    ?>
  </div>
</nav>
<div class="main_body" style="margin-left:280px;overflow-x:hidden;padding:0px">
    <div class="row m-0 studentAssess">
        <div class="col-md-5 p-3 divs studentAssess" style="">
            <span style="font-weight:bolder;padding-left:5px">All student</span>
            <div class="collection m-0" style="height:85vh;overflow-y:scroll">
                <?php
                    $run=0;
                    while($run != 19){
                        ++$run;
                        ?>
                            <a href="#!" class="collection-item pl-2 addshowAssess">
                                <img src="/webImage/slider1.jpg" style="width:40px;height:40px" class="circle mr-2">
                                <span class="title black-text" style="font-size:20px;font-weight:bold">Williams Victor Ebube</span>
                            </a>
                        <?php
                    }
                ?>
            </div>
        </div>
        <div class="col-md-7 p-0 divf" style="position:relative;">
            <div class="white p-3" style="position:fixed;overflow-y:scroll;height:93vh;">
                assumenda voluptas non atque aperiam quam commodi reprehenderit velit temporibus architecto veniam. Eligendi dolore quam fuga natus, autem unde repellat tempore, a, sed dolorum reprehenderit laborum numquam amet nihil omnis eveniet nulla? Maiores doloribus qui a error? Eligendi pariatur eaque maxime dolorum dolore ad, iusto quasi inventore voluptatibus modi. Error non suscipit omnis delectus incidunt! Laudantium, temporibus suscipit omnis itaque, commodi voluptatem necessitatibus aliquid vitae, ratione voluptatibus illum molestias tempore beatae illo tempora molestiae repellendus! Commodi nihil voluptatibus reprehenderit, quos eum quisquam possimus a iure labore necessitatibus voluptatum. Officia dolorem quisquam nisi ut nesciunt blanditiis omnis laboriosam quasi quos. Odio aliquam culpa a quam facilis quibusdam quas adipisci ea quae? Maxime soluta quae facere, quaerat sequi, a debitis ea quos laudantium iusto nam veniam vero vel rerum temporibus laboriosam dolores in fugiat eveniet quasi non id sit velit. Dolore omnis assumenda autem officia quo dolor, quaerat id reprehenderit doloribus repellendus placeat explicabo laborum adipisci sunt tempore perspiciatis doloremque. Ab dolor officia modi reprehenderit architecto fugit perspiciatis adipisci saepe. Id non quidem voluptas. Inventore nulla facilis enim est dolores suscipit similique minus vitae, sunt exercitationem illum ut odio quas tempora iure blanditiis alias reiciendis facere sapiente neque nisi? Ratione necessitatibus pariatur eos hic assumenda tenetur amet asperiores tempore mollitia deserunt. Harum dolorum voluptates rem unde dolores, illo rerum ducimus officia perferendis cum corporis fuga ex omnis? Quae, labore! Laborum accusantium quis earum fuga vitae odio suscipit, deleniti corporis nam a, perferendis veniam, ab id eaque modi sed ducimus obcaecati qui quibusdam natus nobis reprehenderit alias illum ullam. Debitis quod molestias alias voluptates dolorum amet at impedit natus architecto illum? Error sed repellat alias expedita, esse nam impedit delectus laboriosam porro nulla iure eveniet, earum ad veritatis voluptatem sint eum officiis aspernatur consectetur quisquam? Voluptatum rerum vitae sit labore, at, reiciendis animi eligendi earum iste maiores alias nobis laboriosam, quisquam eveniet.<br>
                <div class="btn red white-text waves-effect waves-white">Publish result</div>
                <div class="pb-4"></div>
            </div>
        </div>
    </div>
</div>