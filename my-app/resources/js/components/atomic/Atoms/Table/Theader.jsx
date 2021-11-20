import React, { useCallback, useState, useEffect } from 'react'

const Theader = (props) => {
    return (
        <th className={props.className} scope={props.scope}>
            {props.header}
        </th>
    )
}

export default Theader
