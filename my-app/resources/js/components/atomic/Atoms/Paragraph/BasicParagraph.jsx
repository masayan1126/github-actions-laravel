import React, { useCallback, useState, useEffect } from 'react'

const BasicParagraph = (props) => {
    return <p className={props.className}>{props.text}</p>
}

export default BasicParagraph
