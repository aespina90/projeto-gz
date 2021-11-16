import React from "react";
import { useForm } from "react-hook-form";
import "./FirstStep.css";

import ItemForm from "./ItemForm";

const FirstStep = ({ setForm, formData, navigation }) => {
  const { firstName, email, telefone, passwd } = formData;
  const { next } = navigation;

  return (
    <div className="login-form">
      <h3>Seus dados para cadastro.</h3>
      <ItemForm
        label="Nome"
        name="firstName"
        value={firstName}
        onChange={setForm}
      />
      <ItemForm label="E-mail" name="email" value={email} onChange={setForm} />
      <ItemForm
        label="Telefone"
        name="telefone"
        value={telefone}
        onChange={setForm}
      />
      <ItemForm label="Senha" name="passwd" value={passwd} onChange={setForm} />
      <div>
        <button onClick={next}>Próximo</button>
      </div>
    </div>
  );
};

export default FirstStep;
