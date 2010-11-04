$(document).ready(function(){
//    var wacAppController;
//    wacAppController = {
//        mycollection : $([])
//    }
//
//    var obj1 = {name: "obj1"};
//    var obj2 = {name: "obj2"};
//
//    wacAppController.mycollection = wacAppController.mycollection.add(obj1);
//    wacAppController.mycollection = wacAppController.mycollection.add(obj2);
//
//    wacAppController.mycollection.each(function(i){
//        Wac.log(i + ":" + this.name);
//    })

//   $(document).wacPage().showTips("sth");
//   Wac.log("fffffff1: " + $(document).wacFoo().getSize(55));
   Wac.log($(document).wacFoo().isEmail("mymail@163.com"));
   Wac.log($(document).wacFoo().isEmail("mymail@com"));
})