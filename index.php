<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script type="text/javascript"></script>
    <script type="text/javascript" src="js/node_modules/crypto-js/crypto-js.js"></script>
    <script src='js/app.js'></script>
    <script src='js/exempleCtrl.js'></script>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>
</head>
<body>
    <div ng-app="app">
        
        <div ng-controller="ExempleCtrl">
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Description</th>
                    <th>Password encrypte</th>
                    <th>Users</th>
                    <th>decrypter</th>  
                </tr>
                <?php include_once('show.php'); ?>
                <tr ng-repeat = 'pwd in pwds'>
                    <td>{{pwd.id}}</td>
                    <td>{{pwd.description}}</td>
                    <td><span>{{pwd.pwd_encrypt}}</span></td>
                    <td>{{pwd.auth_users}}</td>
                    <td>
        <label for= "keyy">Key : <input type="text" name="keyy" id="keyy" ng-model = 'pwd.key_try'></label>
        <button ng-click = 'pwd_decrypt(pwd.id,pwd.pwd_encrypt,pwd.key_try)'> Envoyer</button><span><strong>  {{pwd.pwd_clear}}</strong></span></td>
                </tr>   
            </table>
        </div>
    <div class="sauvegarde"><button>sauvegarder</button><?php include_once('sauvegarde.php'); ?></div>
    <div class="creat_pwd">
        <h3>Creer pwd</h3>
        <label for= "user"> User : <input type="text" name="user" id="user" ng-model = 'pwd.user'></label></br>
        <label for= "pwd"> Password : <input type="text" name="pwd" id="pwd" ng-model = 'pwds.pwd_clear'></label></br>
        <label for= "description"> Description : <input type="text" name="description" id="description" ng-model = 'pwds.description'></label></br>
        <label for= "key">Key : <input type="text" name="key" id="key" ng-model = 'pwds.key'></label></br>
        <button ng-click = 'pwd_create(pwds.pwd_clear,pwds.description,pwds.key,pwd.user)'> Envoyer</button>
    </div>
    <div class="easy_decrypt">
        <h3>Decrypter pwd</h3>
        <label for= "pwd-encrypt"> Password crypte: <input type="text" name="pwd-encrypt" id="pwd-encrypt" ng-model = 'pwds.pwd_encrypt'></label></br>
        <label for= "key_encrypt">Key : <input type="text" name="key_encrypt" id="key_encrypt" ng-model = 'pwds.key_encrypt'></label></br>
        <button ng-click = 'pwd_read(pwds.pwd_encrypt,pwds.key_encrypt)'>Decripter</button>
    </div>
        <div class="resultat_easy">Resultat decrypte : {{instant_pwd.pwd_clear}}</div>
        </div>

    </div>
</body>
</html>
