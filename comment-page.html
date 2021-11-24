<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cmt.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="homepage.css">
    <title>comment picture page</title>
</head>
<body  onload="rendercmt()">

    <div class="top">
        <div class="logo-box">
            <a href="#" class="logo">EMNIA</a>
        </div>
        <ul>
            <li><a href="#">TRANG CHỦ</a></li>
            <li class="dropdown">
                <a class="funtion">THÊM</a>
                <div class="funtion-box">
                    <a href="#">POST ẢNH</a>
                    <a href="#">ĐĂNG NHẬP</a>
                    <a href="#">ĐĂNG XUẤT</a>
                    <a href="#">NGƯỜI DÙNG</a>
                </div>
            </li>
        </ul>
        <div class="user-box">
            <div class="avatar">
                <img src="" alt="">
            </div>
            <div class="user-name">Quang Minh</div>
        </div>
    </div>


    <div class="content-box">
       
        <div class="content">
            <div class="picture">
                <img src="#" alt="">
            </div>
            <div class="comment-box">
                <div class="comment-form">
                    <form action="">
                        <input type="hidden" id="index">
                        <label for="cmt" class="label">Bình luận</label>
                        <textarea type="text" name="cmt" id="cmt"  placeholder="Nhập bình luận" class="comment"></textarea>
                        <button class="submit" onclick="savecmt()" id="save">Bình luận</button>
                        <button id="edit" style="display: none;" onclick="changecmt()" class="edit">edit</button>
                    </form>
                    
                </div>
               
            </div>
            
        </div>
        <div class="cmt-table-box">
            <div class="cmt-table">
                <table id='tablecontent'  cellpadding="10" cellspacing="0" >
                    
                </table>
            </div>
        
        </div>
    </div>
    


    <script>
        function resetInput(){
            document.getElementById('cmt').value = ''
        }
        function savecmt(){
            let cmt = document.getElementById('cmt').value
            if (cmt) {
                let cmtArr = localStorage.getItem('comment') ? JSON.parse(localStorage.getItem('comment')):[]
                cmtArr.unshift(cmt)
                localStorage.setItem('comment',JSON.stringify(cmtArr))
            }
            resetInput()
            rendercmt()
        }

        function rendercmt(){
            let cmtArr = localStorage.getItem('comment') ? JSON.parse(localStorage.getItem('comment')):[]
            let cmt = `<tr>
                        <td>comment</td>
                        <td>action</td>
                    </tr>`
            cmtArr.forEach((value, index) => {
                cmt += `<tr>
                        <td>${value}</td>
                        <td><button onclick="editcmt(${index})">edit</button> <button onclick="deletecmt(${index})">delete</button></td>
                        </tr>`
            });

            document.getElementById('tablecontent').innerHTML = cmt
        }

        function editcmt(key){
            let cmtArr = localStorage.getItem('comment') ? JSON.parse(localStorage.getItem('comment')):[]
            document.getElementById('cmt').value = cmtArr[key]
            document.getElementById('index').value = key
            document.getElementById('save').style.display='none'
            document.getElementById('edit').style.display='inline-block'
        }

        function changecmt(){
            let cmtArr = localStorage.getItem('comment') ? JSON.parse(localStorage.getItem('comment')):[]
            let index = document.getElementById('index').value
            cmtArr[index] = document.getElementById('cmt').value
            localStorage.setItem('comment',JSON.stringify(cmtArr))
            rendercmt()
            resetInput()
            document.getElementById('save').style.display='inline-block'
            document.getElementById('edit').style.display='none'
        }
        
        function deletecmt(key){
            let cmtArr = localStorage.getItem('comment') ? JSON.parse(localStorage.getItem('comment')):[]
            if(confirm('Are you sure ?')){
                cmtArr.splice(key,1)
            }
            localStorage.setItem('comment',JSON.stringify(cmtArr))
            rendercmt()
        }
    </script>
</body>
</html>