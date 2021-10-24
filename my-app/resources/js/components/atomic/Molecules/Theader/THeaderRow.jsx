import React, { useCallback, useState, useEffect } from 'react'
import Theader from '../../Atoms/Table/Theader'

const THeaderRow = (props) => {
    return (
        <tr>
            {props.headerList.map((header) => (
                <Theader header={header} />
            ))}
        </tr>
    )
}

export default THeaderRow
