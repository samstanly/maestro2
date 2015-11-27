package jmaestrotrace;

import java.util.ArrayList;
import java.util.HashMap;

import javax.swing.JScrollPane;
import javax.swing.JTabbedPane;
import javax.swing.JTextArea;

public class DumpArea extends JTabbedPane {
	
	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private JTextArea textArea;
	private HashMap<String,JTextArea> map;
	private ArrayList<String> tabs;
	
	public JTabbedPane get() {
		this.tabs = new ArrayList<String>(); 
		this.tabs.add("Todas");
		this.tabs.add("Busca"); 
		this.tabs.add("Trace");
		this.tabs.add("Uses");
		this.tabs.add("SQL");
		this.tabs.add("Login");
		this.tabs.add("Handler");
		this.tabs.add("Profile");
		this.tabs.add("Error");
		this.tabs.add("Custom");						
		map = new HashMap<String,JTextArea>();
		for(String tab : this.tabs){
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
