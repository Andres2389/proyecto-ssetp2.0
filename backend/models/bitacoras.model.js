const mongoose = require("mongoose");

const BitacoraSchema = mongoose.Schema({
  tipo_documento: {
    type: String,
    required: true,
    trim: true,
  },
  numero_documento: {
    type: String,
    required: true,
    unique: true,
    trim: true,
  },
  nombre: {
    type: String,
    required: true,
    trim: true,
  },
  apellidos: {
    type: String,
    required: true,
    trim: true,
  },
  celular: {
    type: String,
    required: true,
    trim: true,
  },
  correo: {
    type: String,
    required: true,
    unique: true,
    trim: true,
  },
  tipo_alternativa: {
    type: String,
    trim: true,
  },
  estado_sofia: {
    type: String,
    trim: true,
  },
  proyecto: {
    type: String,
    trim: true,
  },
  arl: {
    type: String,
    trim: true,
  },
  ficha: {
    type: String,
    trim: true,
  },
  nombre_programa: {
    type: String,
    trim: true,
  },
  instructor_seguimiento: {
    type: String,
    trim: true,
  },
  numero_radicado: {
    type: String,
    trim: true,
  },
  numero_bitacoras: {
    type: String,
    trim: true,
  },
  fecha_asignacion: {
    type: String,
    trim: true,
  },
  fecha_inicio_ep: {
    type: String,
    trim: true,
  },
  fecha_fin_ep: {
    type: String,
    trim: true,
  },
  observaciones: {
    type: String,
    trim: true,
  },
  momentos: {
    type: String,
    trim: true,
  },
  paz_salvo: {
    type: String,
    trim: true,
  },
});

module.exports = mongoose.model("Bitacora", BitacoraSchema);
