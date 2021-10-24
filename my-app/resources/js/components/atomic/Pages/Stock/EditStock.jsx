import React, { useCallback, useState, useEffect } from 'react'
import ReactDOM from 'react-dom'
import styled from 'styled-components'

const PrimaryButton = styled.button({
    backgroundColor: 'blue',
    border: 'none',
    padding: '4px 14px'
})

const EditStock = () => {
    return (
        <div>
            <button>登録</button>
        </div>
    )
}

export default EditStock
if (document.getElementById('idname')) {
    if (document.getElementById('idname')) {
        ReactDOM.render(<EditStock />, document.getElementById('idname'))
    }
}
