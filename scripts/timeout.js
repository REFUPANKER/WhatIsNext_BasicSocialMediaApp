function repeatself() {
    jQuery.ajax("./managers/SessionTimeout.php", {
        method: "get",
        success: (e => {
            if (e.startsWith("-") || e.split(':')[1].startsWith("-") || e=="0:0") {
                window.location.reload();
            }
            document.title = "What is Next | " + e;
            setTimeout(() => {
                repeatself();
            }, 1000);
        })
    })
    
}
repeatself();