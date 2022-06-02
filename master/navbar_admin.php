 <!-- Side Nav START -->
 <div class="side-nav">
     <div class="side-nav-inner">
         <ul class="side-nav-menu scrollable">
             <li class="nav-item dropdown">
                 <a href=<?php echo $Dashboard_link; ?>>
                     <span class="icon-holder">
                         <i class="anticon anticon-dashboard"></i>
                     </span>
                     <span class="title"><?php echo $Dashboard; ?></span>
                 </a>
             </li>
             <li class="nav-item dropdown">
                 <a href=<?php echo $Department_link; ?>>
                     <span class="icon-holder">
                         <i class="anticon anticon-dashboard"></i>
                     </span>
                     <span class="title"><?php echo $Department; ?></span>
                 </a>
             </li>

             <li class="nav-item dropdown">
                 <a class="dropdown-toggle" href="javascript:void(0);">
                     <span class="icon-holder">
                         <i class="anticon anticon-pie-chart"></i>
                     </span>
                     <span class="title"><?php echo $Employee; ?></span>
                     <span class="arrow">
                         <i class="arrow-icon"></i>
                     </span>
                 </a>
                 <ul class="dropdown-menu">
                     <li>
                         <a href=<?php echo $MyTeam_link; ?>><?php echo $My_Team; ?></a>
                     </li>
                     <li>
                         <a href=<?php echo $AllEmployee_link; ?>><?php echo $All_Employee; ?></a>
                     </li>
                     <li>
                         <a href=<?php echo $Evaluation_link; ?>><?php echo $Evaluation; ?></a>
                     </li>
                 </ul>
             </li>

             <li class="nav-item dropdown">
                 <a href=<?php echo $Parameter_link; ?>>
                     <span class="icon-holder">
                         <i class="anticon anticon-dashboard"></i>
                     </span>
                     <span class="title"><?php echo $Parameter; ?></span>
                 </a>
             </li>
         </ul>
     </div>
 </div>
 <!-- Side Nav END -->