import React from "react";

const states = [
  ["SP", "São Paulo"],
  ["RJ", "Rio de Janeiro"]
];

const StateDrop = ({ label, ...others }) => (
  <>
    <label>{label}</label>
    <select {...others}>
      {states.map(([value, name]) => (
        <option value={value}>{name}</option>
      ))}
    </select>
  </>
);

export default StateDrop;