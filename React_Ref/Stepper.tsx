//@ts-nocheck
import React, { forwardRef } from 'react';

const Stepper = (props, ref) => {
  console.log(props,"---p")

  let unqid = props && props.param && props.param.key ? props.param.key : "";

  // style parameters
  let top = props && props.param && props.param.style && props.param.style.top ? props.param.style.top : null;
  let left = props && props.param && props.param.style && props.param.style.left ? props.param.style.left : null;
  let width = props && props.param && props.param.style && props.param.style.width ? props.param.style.width : null;
  let height = props && props.param && props.param.style && props.param.style.height ? props.param.style.height : null;
  let position = props && props.param && props.param.style && props.param.style.position ? props.param.style.position : null;
  let zIndex = props && props.param && props.param.style && props.param.style.zIndex ? props.param.style.zIndex : null;
  let options  =  props && props.options ? props.options : [];
  let symbol  =  props && props.symbol ? props.symbol : "";

  return (
    <>
     <select onChange={() => { props.handleOnChange(unqid) }} unqid={unqid} ref={props.propref}  >
        {options.map((e)=>(
          <option value={e.value} > {symbol} {e.label} </option>
        ))}
      
      </select>
    </>
  );
};

export default forwardRef(Stepper);
