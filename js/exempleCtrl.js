app.controller('ExempleCtrl',	function ($scope) {
var passwords = [];

$scope.pwds = passwords;

$scope.pwd_encrypt = function(pwd,key){
    
    if (pwd != null){
        console.log(CryptoJS.AES.encrypt(pwd, key));
        var ciphertext =  CryptoJS.AES.encrypt(pwd, key).toString();
        return ciphertext;
    }else
        return null;
};

$scope.pwd_decrypt = function(idd,password,key){
        
    var byte = CryptoJS.AES.decrypt(password, key);
    var plaintext = byte.toString(CryptoJS.enc.Utf8);
    passwords[idd].pwd_clear = plaintext;
    passwords.key = null
    
    console.warn(passwords);
    
};
    
$scope.pwd_create = function(password,description,key, users){
    var obj = {
        id: passwords.length,
        pwd_clear : null,
        pwd_encrypt : $scope.pwd_encrypt(password,key),
        description : description,
        key: null,
        auth_users : users != undefined ? users.split(",") : ""
    };
    passwords.push(obj);
    console.warn(passwords);
};

    console.info(passwords);
$scope.pwd_read = function(password,key){
    var obj = {
    pwd_clear : null,
    pwd_encrypt : password};
    $scope.instant_pwd = obj;
    var byte = CryptoJS.AES.decrypt(password, key);
    var plaintext = byte.toString(CryptoJS.enc.Utf8);
    obj.pwd_clear = plaintext;
};
$('.sauvegarde button').on('click',function(){
    $.ajax({
    url : "http://localhost/inter-mdp/angular-sample/sauvegarde.php",
    type: "POST",
    dataType : JSON,
    data : '{"test":"jsonformat"}',
    success: function(data)
    {
              alert(data);
        consol
    },
    error: function ()
    {
        console.info('une erreur est survenue');
        alert('La requête n\'a pas abouti');
    }
});
});
});
