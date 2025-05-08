import React from 'react';

const Button = ({ className, children, onClick, style, disabled }) => {
    return (
        <button 
            type="button"
            className={className}
            onClick={onClick}
            style={style}
            disabled={disabled}
        >
            {children}
        </button>
    );
};

export default Button;