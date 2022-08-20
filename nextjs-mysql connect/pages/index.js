import Link from 'next/link'
import axios from 'axios'
import User from '../components/user'
import { useEffect, useState } from 'react'



function Home() {
   const [users, setUsers] = useState([]);

   useEffect(() => {
      fetchUsers();
    }, []); // <- add the count variable here
  
   const handleSubmit=()=>{
      let data={
         name:"nnnnnnnnnnnnn",
         registration:"2018331076"
      }
     axios.post("/api/practice/dummy",data).then((response)=>{
      console.log(response);
      fetchUsers();
     }).catch((error)=>{
      console.log(error);
     })
   }

   const fetchUsers = ()=>{
      axios.get("/api/practice/dummy/").then((response)=>{
         console.log(response.data.result);
         setUsers(response.data.result);
      }).catch((error)=>{
         console.log(error);
      })
   }
   return (
      <>
       <h1>List of users</h1>
       {users.map((user)=>{
           return (
               <div key={user.id}>
                  <User user={user}/>
               </div>
           )
       })}
         <h1>Next JS pre-rendering</h1>
         <Link href='/users'>
            <a>Users</a>
         </Link>
         <Link href='/posts'>
            <a>Posts</a>
         </Link>
         <button onClick={handleSubmit}>click me</button>
      </>
   )
}

export default Home