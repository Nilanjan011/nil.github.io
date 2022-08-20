import { db } from "../../../config/db";

export default async(req,res)=>{
    console.log(req.method);
    if(req.method === "POST"){
    var sql="INSERT INTO `dummy`(`name`, `registration`) VALUES ('"+req.body.name+"','"+req.body.registration+"')";
    db.query(sql,function(error,result){
        if(error){
            return res.send({
                status:"fail",
                message:error,
            })
        }
        else{
            return res.send({
                status:"success",
                message:"successfully registered",
                result:result,
            })
        }
    })
}   else if(req.method === "GET"){
    var sql="SELECT * FROM `dummy`";
    db.query(sql,function(error,result){
        if(error){
            return res.send({
                status:"fail",
                message:error,
            })
        }
        else{
            return res.send({
                status:"success",
                message:"successfully registered",
                result:result,
            })
        }
    })
}
}