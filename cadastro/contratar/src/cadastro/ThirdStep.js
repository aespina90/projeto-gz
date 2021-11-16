import React from "react";

import ItemForm from "./ItemForm";
import StateDrop from "./StateDrop";

const ThirdStep = ({ setForm, formData, navigation, state }) => {
  const { logradouro, numero, bairro, cidade, cep } = formData;

  const { previous, next } = navigation;

  return (
    <div className="login-form">
      <h3>Endereço</h3>
      <ItemForm
        label="Logradouro"
        name="logradouro"
        value={logradouro}
        onChange={setForm}
      />
      <ItemForm label="Nº" name="numero" value={numero} onChange={setForm} />
      <ItemForm
        label="Bairro"
        name="bairro"
        value={bairro}
        onChange={setForm}
      />
      <ItemForm
        label="Cidade"
        name="cidade"
        value={cidade}
        onChange={setForm}
      />
      <ItemForm label="CEP" name="cep" value={cep} onChange={setForm} />
      <StateDrop label="Estado" name="state" value={state} onChange={setForm} />
      <div>
        <button onClick={previous}>Voltar</button>
        <button onClick={next}>Próximo</button>
      </div>
    </div>
  );
};

export default ThirdStep;
