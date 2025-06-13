<?php
$isSubmitted = $_SERVER['REQUEST_METHOD'] === 'POST';
if ($isSubmitted) {
    $userId = $_POST['userId'] ?? '';
    $userName = $_POST['userName'] ?? '';
    $userEmail = $_POST['userEmail'] ?? '';
    $userPass = $_POST['userPass'] ?? '';
    $userHobby = $_POST['userHobby'] ?? [];
    $userGender = $_POST['userGender'] ?? '';
    $userTel = $_POST['userTel'] ?? '';
    $userMemo = $_POST['userMemo'] ?? '';
}
?>

<!-- http://localhost:8888/shopping-mall/form_process.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>정보 입력</title>
    <style>
        @font-face {
            font-family: 'Pretendard-Regular';
            src: url('https://fastly.jsdelivr.net/gh/Project-Noonnu/noonfonts_2107@1.1/Pretendard-Regular.woff') format('woff');
            font-weight: 400;
            font-style: normal;
        }

        * {
            font-family: 'Pretendard-Regular', "Share Tech Mono", monospace;
            box-sizing: border-box;
        }

        body {
            background-color: #0D0D1A;
            color: #D1D5DB;
            padding: 50px;
            margin: 0;
            background-image:
                linear-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(rgba(255, 255, 255, 0.01) 2px, transparent 2px);
            background-size: 50px 50px, 50px 50px, 100% 3px;
            animation: fadeIn 1.2s ease-in-out;
        }

        h1 {
            font-family: "Orbitron", sans-serif;
            font-size: 3rem;
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
            position: relative;
            animation: glitch 1.5s linear infinite;
        }

        h1::before,
        h1::after {
            content: attr(data-text);
            position: absolute;
            left: 0;
            right: 0;
            top: 0;
            background: #0D0D1A;
            overflow: hidden;
        }

        h1::before {
            left: 2px;
            text-shadow: -2px 0 #F000B8;
        }

        h1::after {
            left: -2px;
            text-shadow: -2px 0 #00C2FF, 2px 2px #F000B8;
        }

        p {
            text-align: center;
            font-size: 1rem;
            color: #00C2FF;
            text-shadow: 0 0 5px #00C2FF, 0 0 10px #00C2FF;
            margin-bottom: 40px;
        }

        table {
            width: 95%;
            max-width: 850px;
            margin: 40px auto;
            border-collapse: separate;
            border-spacing: 0 15px;
            animation: slideUp 1s ease-out;
        }

        td {
            padding: 10px;
            background: linear-gradient(145deg, rgba(0, 194, 255, 0.05), rgba(240, 0, 184, 0.05));
            position: relative;
            border: 1px solid rgba(240, 0, 184, 0.3);
            clip-path: polygon(0 0, 100% 0, 100% calc(100% - 15px), calc(100% - 15px) 100%, 0 100%);
            transition: all 0.3s ease;
        }

        tr:hover td {
            background: linear-gradient(145deg, rgba(0, 194, 255, 0.1), rgba(240, 0, 184, 0.1));
            border-color: #F000B8;
        }

        td:first-child {
            width: 30%;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 0 5px #F000B8, 0 0 10px #F000B8;
            text-align: right;
            padding-right: 30px;
            border-right: 1px solid rgba(240, 0, 184, 0.5);
        }

        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="tel"],
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: none;
            font-size: 1rem;
            background: transparent;
            color: #D1D5DB;
            transition: all 0.3s ease;
            caret-color: #F000B8;
        }

        input:focus,
        textarea:focus {
            outline: none;
            background: rgba(0, 194, 255, 0.1);
            color: #fff;
        }

        input::placeholder,
        textarea::placeholder {
            color: #555;
        }

        input[type="checkbox"],
        input[type="radio"] {
            accent-color: #F000B8;
            cursor: pointer;
        }

        label {
            color: #D1D5DB;
            cursor: pointer;
            margin-right: 15px;
        }

        label:hover {
            color: #F000B8;
        }

        textarea {
            resize: none;
            min-height: 80px;
        }

        span {
            font-size: 0.85rem;
            color: #888;
        }

        div {
            text-align: center;
            margin-top: 30px;
        }

        button {
            background: transparent;
            color: #F000B8;
            border: 2px solid #F000B8;
            padding: 14px 32px;
            margin: 10px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            text-shadow: 0 0 5px #F000B8, 0 0 10px #F000B8;
            box-shadow: inset 0 0 10px rgba(240, 0, 184, 0.5), 0 0 10px rgba(240, 0, 184, 0.5);
            clip-path: polygon(0 0, calc(100% - 15px) 0, 100% 15px, 100% 100%, 15px 100%, 0 calc(100% - 15px));
        }

        button:hover {
            color: #fff;
            background: #F000B8;
            box-shadow: 0 0 20px #F000B8, 0 0 30px #F000B8;
        }

        button[type="reset"] {
            color: #00C2FF;
            border-color: #00C2FF;
            text-shadow: 0 0 5px #00C2FF, 0 0 10px #00C2FF;
            box-shadow: inset 0 0 10px rgba(0, 194, 255, 0.5), 0 0 10px rgba(0, 194, 255, 0.5);
        }

        button[type="reset"]:hover {
            color: #fff;
            background: #00C2FF;
            box-shadow: 0 0 20px #00C2FF, 0 0 30px #00C2FF;
        }

        a {
            display: inline-block;
            text-align: center;
            margin-top: 40px;
            color: #00C2FF;
            text-decoration: none;
            border: 1px solid #00C2FF;
            padding: 10px 20px;
            transition: all 0.3s ease;
        }

        a:hover {
            background: #00C2FF;
            color: #0D0D1A;
            box-shadow: 0 0 15px #00C2FF;
        }

        @keyframes glitch {

            2%,
            64% {
                transform: translate(2px, 0) skew(0deg);
            }

            4%,
            60% {
                transform: translate(-2px, 0) skew(0deg);
            }

            62% {
                transform: translate(0, 0) skew(5deg);
            }
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <?php if (!$isSubmitted): ?>
        <h1>정보 입력</h1>
        <hr>
        <p>
            *표시는 필수사항 입니다
        </p>
        <form action="" method="post">
            <table>
                <tr>
                    <td>아이디 입력 * </td>
                    <td>
                        <input type="text" name="userId" required>
                    </td>
                </tr>
                <tr>
                    <td>사용자 이름 *</td>
                    <td>
                        <input type="text" name="userName" required placeholder="실명을 입력해주세요">
                    </td>
                </tr>
                <tr>
                    <td>비밀번호 입력 *</td>
                    <td>
                        <input type="password" name="userPass" required> <br>
                        <span>6~12자의 영문 소문자와 숫자만 사용할 수 있습니다.</span>
                    </td>
                </tr>
                <tr>
                    <td>이메일 주소 *</td>
                    <td>
                        <input type="email" name="userEmail" placeholder="s2457@e-mirim.hs.kr" required><br>
                        <span>어쩌고 저쩌고 이메일이 필요함</span>
                    </td>
                </tr>
                <tr>
                    <td>취미 입력</td>
                    <td>
                        <label>
                            <input type="checkbox" name="userHobby[]" value="야구">
                            야구
                        </label>
                        <label>
                            <input type="checkbox" name="userHobby[]" value="축구">
                            축구
                        </label>
                        <label>
                            <input type="checkbox" name="userHobby[]" value="배구">
                            배구
                        </label>
                        <label>
                            <input type="checkbox" name="userHobby[]" value="숨쉬기">
                            숨쉬기
                        </label>
                        <label>
                            <input type="checkbox" name="userHobby[]" value="영화">
                            영화
                        </label>
                    </td>
                </tr>
                <tr>
                    <td>성별</td>
                    <td>
                        <label><input type="radio" name="userGender" value="남자" required>남자</label>
                        <label><input type="radio" name="userGender" value="여자" required>여자</label>
                        <label><input type="radio" name="userGender" value="기타" required>기타</label>
                    </td>
                </tr>
                <tr>
                    <td>전화번호 입력</td>
                    <td>
                        <input type="tel" name="userTel" placeholder="전화번호를 제대로 입력해주세요">
                    </td>
                </tr>
                <tr>
                    <td>남길 말</td>
                    <td><textarea name="userMemo" rows="5"></textarea></td>
                </tr>
            </table>
            <div>
                <button type="submit">등록</button>
                <button type="reset">다시쓰기</button>
            </div>
        </form>
    <?php else: ?>
        <h1>입력값 출력 결과</h1>
        <table>
            <tr>
                <td>아이디</td>
                <td><?= htmlspecialchars($userId, ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>사용자 이름</td>
                <td><?= htmlspecialchars($userName, ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>이메일</td>
                <td><?= htmlspecialchars($userEmail, ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>취미</td>
                <td>
                    <?php if (!empty($userHobby)): ?>
                        <?= htmlspecialchars(implode(', ', $userHobby), ENT_QUOTES) ?>
                    <?php else: ?>
                        선택된 취미가 없습니다.
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>성별</td>
                <td><?= htmlspecialchars($userGender, ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td><?= htmlspecialchars($userTel, ENT_QUOTES) ?></td>
            </tr>
            <tr>
                <td>남길 말</td>
                <td><?= htmlspecialchars($userMemo, ENT_QUOTES) ?></td>
            </tr>
        </table>
        <a href="">다시 입력하기</a>
    <?php endif; ?>
</body>

</html>