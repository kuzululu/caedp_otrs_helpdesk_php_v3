<?php

// alerts here if function outside the class no need the keyword public
function showAlertSuccess($result){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
position: 'top-end',
title: 'Notification',
text: '$result!',
icon: 'info',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false
});
setTimeout(()=>{
window.location.href = window.location.href;
},2000);
});
</script>";
}

// alerts here if function outside the class no need the keyword public
function showAlertUpdateSuccess($result){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
position: 'top-end',
title: 'Notification',
text: '$result!',
icon: 'info',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false
});
setTimeout(()=>{
window.location.href = 'index';
},2000);
});
</script>";
}

function showAlertLoginError($result){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
position: 'top-end',
title: 'Error',
text: '$result!',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false
});
setTimeout(()=>{
window.location.href = window.location.href;
},2000);
});
</script>";
}

function showAlertDelete($result){
echo "<script type='text/javascript' src='../js/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
position: 'top-end',
title: 'Deleted',
text: '$result',
icon: 'error',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
});
setTimeout(()=>{
window.location.href = window.location.href;
},2000);
});
</script>";
}

function showAlertApptSuccess($result){
echo "<script type='text/javascript' src='j../s/sweetalert2.all.min.js'></script>";
echo "<script type='text/javascript'>
document.addEventListener('DOMContentLoaded', ()=>{
Swal.fire({
position: 'top-end',
title: 'Notification',
text: '$result!',
icon: 'info',
allowOutsideClick: false,
showConfirmButton: false,
allowEscapeKey: false,
footer: '<a id=\"swal-success\" type=\"button\" href=\"' + window.location.href + '\">Confirm</a>'
});
});
</script>";
}

?>

