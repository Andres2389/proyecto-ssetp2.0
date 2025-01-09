const Bitacoras = require("../models/bitacoras.model");
const image = require("../utils/image");


async function getBitacoras(req, res) {
    const { active } = req.query;

    let response = null;

    if (active === undefined) {
        response = await Bitacoras.find();
    } else {
        response = await Bitacoras.find({ active });
    }

    res.status(200).send(response);
}

async function createBitacora(req, res) {
    const bitacora = new Bitacoras(req.body );

    bitacora.save((error, bitacoraStored) => {
        if (error) {
            res.status(400).send({ msg: "Error al crear la bitácora" });
        } else {
            res.status(201).send(bitacoraStored);
        }
    });
}

async function updateBitacora(req, res) {
    const { id } = req.params;
    const bitacoraData = req.body

    Bitacoras.findByIdAndUpdate({ _id: id }, bitacoraData, (error) => {
        if (error) {
            res.status(400).send({ msg: "Error al actualizar la bitácora" });
        } else {
            res.status(200).send({ msg: "Datos de bitácora actualizados" });
        }
    });
}

async function deleteBitacora(req, res) {
    const { id } = req.params;

    Bitacoras.findByIdAndDelete(id, (error) => {
        if (error) {
            res.status(400).send({ msg: "Error al eliminar la bitácora" });
        } else {
            res.status(200).send({ msg: "Bitácora eliminada" });
        }
    });
}

module.exports = {
    createBitacora,
    getBitacoras,
    updateBitacora,
    deleteBitacora,
};
