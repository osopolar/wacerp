$(document).ready(function(){
    var wacAppController;
    wacAppController = {
        mycollection : $([])
    }

    var obj1 = {name: "obj1"};
    var obj2 = {name: "obj2"};

    wacAppController.mycollection = wacAppController.mycollection.add(obj1);
    wacAppController.mycollection = wacAppController.mycollection.add(obj2);

    wacAppController.mycollection.each(function(i){
        Wac.log(i + ":" + this.name);
    })
})