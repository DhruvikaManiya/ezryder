<style>
    a {
        text-decoration: none;
        color: black;
    }

    a:visited {
        color: black;
    }

    .box::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .box::-webkit-scrollbar {
        width: 10px;
        background-color: #f5f5f5;
        border-radius: 5px;
    }

    .box::-webkit-scrollbar-thumb {
        background-color: black;
        border: 2px solid black;
        border-radius: 5px;
    }

    header {
        -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
        height: 110px;
        vertical-align: middle;
    }

    h1 {
        float: left;
        padding: 10px 30px;
    }

    body {
        margin: 0;
        padding: 0;
        font-family: "Raleway", sans-serif;
    }

    .icons {
        display: inline;
        float: right;
    }

    .notification {
        padding-top: 30px;
        position: relative;
        display: inline-block;
    }

    .number {
        height: 25px;
        width: 22px;
        background-color: #d63031;
        border-radius: 50%;
        color:white;
        text-align: center;
        position: absolute;
        top: 5px;
        left: 60px;
        padding: 3px;
         border-style: solid;
        border-width: 2px;
    }

    .number:empty {
        display: none;
    }

    .notBtn {
        transition: 0.5s;
        cursor: pointer;
    }

    .fas {
        font-size: 20pt;
        padding-bottom: 10px;
        color: black;
        margin-right: 5px;
        margin-left: 40px;
    }

    .box {
        width: 400px;
        height: 0px;
        border-radius: 10px;
        transition: 0.5s;
        position: absolute;
        overflow-y: scroll;
        padding: 0px;
        left: -300px;
        margin-top: 5px;
        background-color: #f4f4f4;
        -webkit-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.2);
        -moz-box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
        box-shadow: 10px 10px 23px 0px rgba(0, 0, 0, 0.1);
        cursor: context-menu;
    }

    .fas:hover {
        color: #d63031;
    }

    .notBtn:hover>.box {
        height: 60vh;
    }

  
</style>
<div class="header theme-bg py-2">
    <div class="container-fluid d-flex justify-content-between">
        <div class="head-left d-flex align-items-center justify-content-center">
            <span class="text-white ff-25">Dashboard</span>

        </div>
       
     <div class="notification">
        <a href="{{route('vendor.notification_store')}}">
            <div class="notBtn" >
              
                <div class="head-right d-flex align-items-center justify-content-center">
                    @if (count($notifications) > 0)
                  
                    <i class="fas fa-bell" style="margin-top:-20px;color:#f5f5f5;"></i>
                    <span class="number" style="margin-top:-4px;margin-left:-5px;color:#f5f5f5;">{{count($notifications)}}</span>
                   @else
                     <i class="fas fa-bell" style="margin-top:-20px;color:#f5f5f5;"></i>
                    {{-- <span class="number" style="margin-top:-4px;margin-left:-5px;color:#f5f5f5;"></span> --}}
                        
                    @endif
               
                    
                </div>
              
            </div>
        </a>
    </div>
</div>
</div>
