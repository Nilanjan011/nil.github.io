//@ts-nocheck
import React, { useState, useRef, useCallback } from 'react';
import DragAndDrop from '../../global/draganddrop';
import Element  from '../../global/components/Element';
import './styles.css';
import Stepper  from '../../global/components/Stepper';
import {abcd} from '../../global/utils/Reference';
import { handleRef} from '../../global/utils/Helper';
import { current } from '@reduxjs/toolkit';


function BlockGame(prop) {

  const ref = React.createRef();
  const myRefs = useRef([]);
  const inputRef = useRef([]);
  const [dropItem, setDropItem] = useState([]);
  const [dragItem, setDragItem] = useState([]);
  const [dropDown, setDropDown] = useState([]);
  const [dropDown1, setDropDown1] = useState([]);

  React.useEffect(() => {
    initialiseUi();
  }, [])
  React.useEffect(() => {
    initialiseUiDdown();
  }, [])
  React.useEffect(() => {
    activateDragAndDrop();

  }, [dragItem])
  

  const initialiseUi = () => {
    initialiseDrop();
    initialiseDrag();

  }
  const initialiseUiDdown = () =>{
    initialDropDown();
    initialDropDown1()
  }
  const initialDropDown = () =>{
    let tmp = [];
    let obj = {}
     let uniqueKeyarr = [];
    for(let i=0;i<=5;i++){
      var Key = uniqueKey();
      console.log(Key);
      
      uniqueKeyarr[i] = Key;
      obj = {
        "key": Key,
       
      }
      tmp.push(obj);
    }

    localStorage.setItem('uniqueKeyarr',JSON.stringify(uniqueKeyarr))
   
    setDropDown(tmp)
  }
  const initialDropDown1 = () =>{
    let tmp = [];
    let obj = {
      "key": uniqueKey(),
      
    }
    tmp.push(obj);
    setDropDown1(tmp)
  }

  const initialiseDrop = () => {
    let tmp = [];
    let obj = {
      "key": uniqueKey(),
      "class": "drop",
      "type": "drop",
    }
    tmp.push(obj);
    setDropItem(tmp)
  }

  const initialiseDrag = () => {
    let tmp = [];
    let obj = {
      "key": uniqueKey(),
      "class": "drag",
      "type": "drag",
      "isdragged": "false",
      style:{
        "top": 380,
        "left": 200
      }
     
    }
    tmp.push(obj);
    setDragItem(tmp)
  }

  const activateDragAndDrop = () => {
    let draggable = [];
    let droppable = [];
    // console.log('myRefs --?', myRefs)
    myRefs.current.map((e) => {
      if (e != null && e != undefined && e.ele != null) {
        e.ele.getAttribute("type") == "drag" ? draggable.push(e.ele) : droppable.push(e.ele)
      }
    })
    DragAndDrop.activateDragAndDrop({
      draggables: draggable,
      droppables: droppable,
      onMouseDown: (data) => { },
      onMouseMove: (data) => { },
      onMouseUp: (data) => {
        console.log(data)
        if (!data.droppedTarget) {
          updadeDragProps(data.target.getAttribute('unqid'), data.target.getAttribute('data-top'), data.target.getAttribute('data-left'), data.target.getAttribute('isdragged'))

        }
        if (data.droppedTarget) {
          updadeDragProps(data.target.getAttribute('unqid'), data.target.style.top, data.target.style.left, data.target.getAttribute('isdragged'));

        }
      },
    });

  }


  const updadeDragProps = (unqid, top, left, isDragged = '') => {

    let arr = [];

    dragItem.map((e) => {
      if (e.key == unqid) {
        let obj = {
          "key": e.key,
          "isdragged": "true",
          "class": "drag",
          "type": "drag",
          style: {
            "top": parseInt(top),
            "left": parseInt(left)
          }
        }
        arr.push(obj);
      } else {
        arr.push(e);
      }

    })
    if (isDragged == "false") {
      let obj1 = {
        "key": uniqueKey(),
        "isdragged": "false",
        "class": "drag",
        "type": "drag",
        "style":{
          "top": 380,
          "left": 200
        }
      }
      arr.push(obj1);
    }

    setDragItem(arr)
  }
  const uniqueKey = () => {
    return Date.now().toString(36) + Math.random().toString(36);
  }

  const handleReference = (element, unqid,symbol,options) => {
    let tmp = [];
    let exist = false;
    let obj = {
      "ele": element,
      "key": unqid,
      "sym": symbol,
      "opt": options
    };

    if (myRefs.current.length == 0) {
      myRefs.current.push(obj);

    } else {
      myRefs.current.map((e) => {
        if (e.key != unqid) {
          tmp.push(e);
        }
      });
      tmp.push(obj);
      myRefs.current = tmp;
    }

  }

  const handleOnChange = (id) => {
    // console.log(ele.target.getAttribute('unqid'))
    console.log(id,"----onchange")
    for (let i = 0; i < inputRef.current.length; i++) {
      if ( inputRef.current[i].key == id ) {
        inputRef.current[i].ele.style.backgroundColor = 'red';
      }
      
    }
  }
  const addToRefs = (el)=>{
    console.log(el,el.getAttribute('unqid'),"----el");
    var id = el.getAttribute('unqid');
    console.log('id.....',id);
    let tmp = [];
    let obj = {
      "ele": el,
      "key": id
    };
    if (inputRef.current.length == 0) {
      inputRef.current.push(obj);

    } else {
      inputRef.current.map((e) => {
        if (e.key != id) {
          tmp.push(e);
        }
      });
      tmp.push(obj);
      inputRef.current = tmp;
    }
  }
  const handleMouseDown = useCallback(
    (e) => {
      console.log('e', e.target)
    },
    [],
  );
  const options = [
    { value: '1', label: '1' },
    { value: '2', label: '2' },
    { value: '3', label: '3' },
    { value: '4', label: '4' },
    { value: '5', label: '5' },
    { value: 'delete', label: 'delete' },
    
  ];

  // const addTodo = useCallback(()=>{
  // },[])
  
  return (
    <>
      <label for="number">STAMP TOOL</label>
      {dropDown.map((val, index) => (
        <>
         <Stepper param={val} 
          propref={addToRefs}
          // key={JSON.stringify(val) + index}
          // color = "red"
          options={options} symbol={"x"} 
          handleOnChange={handleOnChange}/>
        </>
        ))}
        
      {/* {dropDown1.map((val, index) => (
        <>
         <Stepper param={val} 
          // color = "pink"
          ref={addToRefs}
          options={options} symbol={"x"} 
          handleOnChange={ handleOnChange}/>
        </>
        ))}*/}
      {/* {dropItem.map((val, index) => (
        <>
        <Element key={JSON.stringify(val) + index} param={val} ref={(element) => handleReference(element, val.key)} handleMouseDown={(e) => handleMouseDown(e)} /></>

      ))}
      {dragItem.map((val, index) => (
        <Element key={JSON.stringify(val) + index} param={val} ref={(element) => handleReference(element, val.key)} handleMouseDown={(e) => handleMouseDown(e)} />
        // <div unqid={val.key} key={val.key + Math.random()} isdragged={val.isdragged + ""} type={val.type} style={{ "top": val.top, "left": val.left }} className={val.class} onMouseDown={(e) => { handleMouseDown(e) }} ref={(element) => handleReference(element, val.key)}></div>
      ))}  */}

    </>
  );
}

export default BlockGame;
