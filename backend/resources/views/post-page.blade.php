<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{URL::asset('/css/post.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Post-page</title>
</head>

<body>
    @include('layout.menu')
    <div class="contain">
        <div class="box">
            <form action="{{env('APP_URL'). 'api/uploadImage'}}" method="POST" id="form_post_product">
                        <div class="previewImg">
                            <input type="file" id="image" name="image" accept="image/png, image/jpeg">
                            <img id="blah" src="#" />
                        </div>

                <div class="describe">
                    <div class="infor_product-category-ali">
                        <div class="tilte-selects">Tiêu đề cho ảnh:<span class="Obligatory">*</span></div>
                        <input type="text" name="name" id="Name_product"
                            class="infor_product-category-ali-select " placeholder="Tiêu đề cho sản phẩm (bắt buộc)">
                        <span class="valid_err_text"></span>
                    </div>

                    <div class="infor_product-category-ali">
                        <div class="tilte-selects">Mô tả ảnh:<span class="Obligatory">*</span></div>
                        <textarea class="infor_product-category-ali-select-describe" inputmode="text"
                            id="Decrip_product" name="detail" placeholder="Viết tiếng Việt có dấu
                        - Kích thước
                        - Độ phân giải
                        - Nguồn gốc
                        "></textarea>
                        <span class="valid_err_text"></span>
                    </div>

                    <div class="infor_product-export">
                        <input type="submit" class="infor_product-export-btn-text" value="Đăng ảnh">
                    </div>
                </div>

            </form>
        </div>

    </div>

    <script type="text/javascript">
        
        $('.BTN-UPLOAD').click(function () {
            if ($('.insert_attach_UP').hasClass('show-btn') === false) {
                $('.insert_attach_UP').addClass('show-btn');

            }
            var _lastimg = jQuery('.List_attach_view li').last().find('input[type="file"]').val();

            if (_lastimg != '') {
                var d = new Date();
                var _time = d.getTime();
                var _html = '<li id="li_files_' + _time + '" class="li_file_hide">';
                _html += '<div class="img-wrap">';
                _html += '<span class="close" onclick="DelImg(this)">×</span>';
                _html += ' <div class="img-wrap-box"></div>';
                _html += '</div>';
                _html += '<div class="' + _time + '">';
                _html += '<input type="file" class="hidden" name="image' + _time + '" accept="image/png, image/jpeg" onchange="uploadImg(this)" id="files_' + _time + '"   />';
                _html += '</div>';
                _html += '</li>';
                jQuery('.List_attach_view').append(_html);
                jQuery('.List_attach_view li').last().find('input[type="file"]').click();
            } else {
                if (_lastimg == '') {
                    jQuery('.List_attach_view li').last().find('input[type="file"]').click();
                } else {
                    if ($('.insert_attach_UP').hasClass('show-btn') === true) {
                        $('.insert_attach_UP').removeClass('show-btn');
                    }
                }
            }
        });

        function uploadImg(el) {
            var file_data = $(el).prop('files')[0];
            var type = file_data.type;
            var fileToLoad = file_data;

            var fileReader = new FileReader();

            fileReader.onload = function (fileLoadedEvent) {
                var srcData = fileLoadedEvent.target.result;

                var newImage = document.createElement('img');
                newImage.src = srcData;
                var _li = $(el).closest('li');
                if (_li.hasClass('li_file_hide')) {
                    _li.removeClass('li_file_hide');
                }
                _li.find('.img-wrap-box').append(newImage.outerHTML);


            }
            fileReader.readAsDataURL(fileToLoad);

        }

        function DelImg(el) {
            jQuery(el).closest('li').remove();

        }
    </script>
    <script src="{{URL::asset('/js/post.js')}}"></script>
    <script>
        
        Validator({
            form: '#form_post_product',
            errSelector: '.valid_err_text',
            rules: [

                Validator.isValue('#Name_product'),

                /*Validator.isValue('#Status_product'),*/
                // Validator.isValue('#Decrip_product'),
            ],
            Onsubmit: function (data) {
                console.log(data);

            }
        });
    </script>
</body>

</html>