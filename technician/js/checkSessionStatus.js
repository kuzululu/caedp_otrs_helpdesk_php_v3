if (!window.location.pathname.includes("index.php")) {

    setInterval(function () {

       fetch("checkSession.php")
        .then(res => res.json())
        .then(data => {

            if (data.status === "expired") {

                Swal.fire({
                    title: "Session Expired",
                    text: "Please login again.",
                    position: "top-end",
                    icon: "warning",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                });
                    setTimeout(()=>{
                    	window.location.href = "../logout";
                    },2000);

            }

        });

}, 5000);
}