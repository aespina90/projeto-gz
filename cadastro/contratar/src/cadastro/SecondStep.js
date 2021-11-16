import React from "react";

import ItemForm from "./ItemForm";

const SecondStep = ({ setForm, formData, navigation }) => {
  const { cnpj, nomeFantasia, razaoSocial } = formData;

  const { previous, next } = navigation;

  return (
    <div className="login-form">
      <h3>Dados da Empresa</h3>
      <ItemForm
        label="CNPJ / CPF"
        name="cnpj"
        value={cnpj}
        onChange={setForm}
      />
      <ItemForm
        label="Nome Fantasia"
        name="nomeFantasia"
        value={nomeFantasia}
        onChange={setForm}
      />
      <ItemForm
        label="Razão Social"
        name="razaoSocial"
        value={razaoSocial}
        onChange={setForm}
      />

      <div>
        <button onClick={previous}>Voltar</button>
        <button onClick={next}>Próximo</button>
      </div>
    </div>
  );
};

export default SecondStep;
