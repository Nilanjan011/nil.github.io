import mysql from "serverless-mysql";

export const db = mysql({
  config: {
    host:process.env.DATABASE_HOST,
    port: 3306,
    database:process.env.DATABASE_NAME,
    user:process.env.DATABASE_USER,
    password:process.env.DATABASE_PASSWORD,
  },
});
/**
 .env file

DATABASE_HOST=localhost
DATABASE_NAME=nx
DATABASE_USER=root
DATABASE_PASSWORD=
 */



