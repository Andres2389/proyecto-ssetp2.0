const express = require("express");
const bitacorasController = require("../controllers/bitacoras.controller");
const md_auth = require ("../middlewares/authenticated")


const api = express.Router();

api.post("/bitacoras", [md_auth.asureAuth], bitacorasController.createBitacora);
api.get("/bitacoras", bitacorasController.getBitacoras);
api.patch("/bitacoras/:id", [md_auth.asureAuth], bitacorasController.updateBitacora);
api.delete("/bitacoras/:id", [md_auth.asureAuth], bitacorasController.deleteBitacora);

module.exports = api;
