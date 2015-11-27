package jmaestrotrace;

import java.util.ArrayList;
import java.util.HashMap;

import javax.swing.JScrollPane;
import javax.swing.JTabbedPane;
import javax.swing.JTextArea;

public class DumpArea extends JTabbedPane {
	
	private JTextArea textArea;
	private HashMap<String,JTextArea> map;
	private ArrayList<String> tabs;
	
	public JTabbedPane get() {
		Preferences p = new Preferences();		
		tabs = p.getChoiceTabs();		
		map = new HashMap<String,JTextArea>();		
		for(String tab : tabs){
			textArea = new JTextArea();
			textArea.setColumns(20);
			textArea.setFont(new java.awt.Font("Monospaced", 0, 12));
			textArea.setLineWrap(true);
			textArea.setRows(5);
			textArea.setWrapStyleWord(true);
			JScrollPane scrollPane = new JScrollPane();
			scrollPane.setViewportView(textArea);
			map.put(tab, textArea);
			addTab(tab,scrollPane);
		}		
		return this;
	}
	
	public ArrayList<String> getTabs(){
		return tabs;
	}
	
	public  HashMap<String,JTextArea> getMap(){
		return map;
	}

}
