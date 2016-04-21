<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <link rel = "stylesheet" type = "text/css" href = "style.css"/>
    <link rel="stylesheet" href="lib/bootstrap.min.css"/>
    <link rel="stylesheet" href="lib/bootstrap-theme.min.css"/>
    <script type="text/javascript" src="lib/jquery-1.12.2.min.js"> </script>
    <script type="text/javascript" src="lib/bootstrap.min.js"> </script>
    <script src="script.js"></script>
    <meta charset="utf-8"/>
</head>

<body style="background-color: #39AACF">
    <header>

    </header>
    <nav>
       <?php
        if(!$_SESSION['name'])echo '
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#reg" id="regBtn" >
            Регистрация
        </button>
        <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Регистрация</h4>
            </div>
            <div class="modal-body">

                <form class="form-horizontal" id="registration" method="POST">
                <div class="form-group">
                    <label class="control-label col-xs-3" for="login">Логин:</label>
                    <div class="col-xs-9">
                    <input name="login" type="text" class="form-control" id="login" placeholder="Введите логин" onblur="checkLogin()" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" id="password1l" for="password1">Пароль:</label>
                    <div class="col-xs-9">
                    <input name="password" type="password" class="form-control" id="password1" placeholder="Введите пароль" required onkeyup="passwordUnderflow()">

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-3" for="password2">Подтвердите пароль:</label>
                    <div class="col-xs-9">
                    <input type="password" class="form-control" id="password2" placeholder="Введите пароль ещё раз" onkeyup="checkPassword()" required >

                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-9" id="error1"></label>
                    <label class="control-label col-xs-9" id="error2"></label>
                </div>
                <br />
                <div class="form-group">
                    <div class="col-xs-offset-3 col-xs-9">
                    <input type="submit" class="btn btn-primary myBtn" value="Регистрация" id="submitReg">

                    <input type="button" class="btn btn-default myBtn" value="Очистить форму" onclick="resetReg()">
                    </div>
                </div>
                </form>
            </div>

            </div>
        </div>
        </div>

        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal" id="regBtn" >
                Вход
            </button>
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Вход</h4>
                </div>
                <div class="modal-body">


                    <form class="form-horizontal" role="form" id="authorization">
                        <div class="form-group">
                            <label for="inputLogin" class="col-sm-2 control-label">Логин</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputLogin" name="login" placeholder="Логин" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Пароль</label>
                            <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="password" placeholder="Введите пароль" required>
                            </div>
                        </div>
                        <div class="form-group">

                            <label class="control-label col-xs-9" id="errorAuthorization">  </label>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default myBtn" >Войти</button>
                            </div>
                        </div>

                </div>
                    </form>
                </div>

                </div>
            </div>
            </div> ';
            else echo '
                <button class="btn btn-primary btn-lg" data-toggle="modal" id="addBtn" data-target="#myModal">
                    Добавить заметку
                </button>

                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Создание заметки</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" id="note">
                                    <input type="text" name="notename" class="form-control" placeholder="Название заметки">
                                    <br/>
                                    <textarea name="text" class="form-control" rows="6" placeholder="Текст заметки"></textarea>

                                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary" onclick="addNote()">Добавить заметку</button>
                      </div>
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary btn-lg"  id="TBtn" onclick="logout()">
                    Выход
                </button>
            ';
            ?>


    </nav>
    <div  id="toTop" onmouseover="mouseOver()" onmouseout="mouseOut()" onclick="toTop()">
        <img src='img/r8.png'></img>
    </div>
    <main>

        <div id = "content">
            <div class="modal fade" id="noteUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Редактирование заметки</h4>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" role="form" id="noteUpd">
                                    <input id="updName" type="text" name="notename" class="form-control" placeholder="Название заметки">

                                    <input id="ident" type="text" name="id" style="visibility: hidden">
                                    <textarea id="updText" name="text" class="form-control" rows="6" placeholder="Текст заметки"></textarea>

                                </form>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary" onclick="editNote()">Сохранить изменения</button>
                      </div>
                    </div>
                  </div>
                </div>
            <div id="fornotes">

            </div>

        </div>
    </main>

</body>
</html>
