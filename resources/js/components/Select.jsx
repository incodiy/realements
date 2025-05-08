import React, { useState } from 'react';

const Select = ({ element }) => {
    const [elements, setElements] = useState([{ id: 0, selected: element.selected }]);
    const [count, setCount] = useState(1);

    const addElement = () => {
        if (!element.maxAdd || elements.length < element.maxAdd) {
            setElements([...elements, { id: count, selected: [] }]);
            setCount(count + 1);
        }
    };

    return (
        <div className="realements-select-group">
            {element.label && <label htmlFor={element.id}>{element.label}</label>}
            
            {elements.map((el, index) => (
                <div key={el.id} className="select-wrapper">
                    <select
                        id={`${element.id}-${el.id}`}
                        name={`${element.name}${element.multiple ? '[]' : ''}`}
                        multiple={element.multiple}
                        defaultValue={el.selected}
                        {...element.attributes}
                    >
                        {[null, ...element.values].map((value, i) => (
                            <option key={i} value={value || ''}>
                                {value ? value.replace(/_/g, ' ').replace(/-/g, ' ') : '-- Select --'}
                            </option>
                        ))}
                    </select>
                    
                    {element.addable && index === elements.length - 1 && (
                        <button
                            type="button"
                            onClick={addElement}
                            className={element.buttonClass}
                            style={{ 
                                float: element.buttonPosition === 'right' ? 'right' : 'left',
                                margin: '5px'
                            }}
                        >
                            Add More
                        </button>
                    )}
                </div>
            ))}
        </div>
    );
};

export default Select;