<!doctype html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }

        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }

        body {
            font-family: "THSarabunNew";
            background-image: url("{{ public_path("images/certificate_template/$certificate_template->certificate_image_background") }}");
            background-repeat: no-repeat;
            width: 100%;
            height: 100vh;
            background-size: cover;
            text-align:center;
        }

    </style>
    <title>เกียรติบัตรคอร์ส {{$course->course_name}} ของ {{$user->Fname}} {{$user->Lname}}</title>
</head>
<body>
    <?php
    function DateThai($strDate)
    {
        $strYear = date('Y', strtotime($strDate)) + 543;
        $strMonth = date('n', strtotime($strDate));
        $strDay = date('j', strtotime($strDate));
        $strHour = date('H', strtotime($strDate));
        $strMinute = date('i', strtotime($strDate));
        $strSeconds = date('s', strtotime($strDate));
        $strMonthCut = ['', 'ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'];
        $strMonthThai = $strMonthCut[$strMonth];
        return "$strDay $strMonthThai $strYear";
    }
    ?>
    <br><br><br><br><br><br><br><br><br><br>
    <b style="font-size: 75px;margin-top:450px;">{{$user->Fname}} {{$user->Lname}}</b><br>
    <label style="font-size: 35px;">{{ $certificate_setting->description }}</label><br>
    <label style="font-size: 35px;;">มอบให้ไว้ ณ วันที่ {{ DateThai($certificate->created_at) }}
    </label>
</body>

</html>
